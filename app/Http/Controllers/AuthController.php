<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        Auth::logout();
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('dashboard.index');
            }
            return redirect()->route('dashboard.index');
        }

        return redirect()->route('login.index')->with('error', 'Data tidak ada di database');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.index')->with('success', 'Berhasil Keluar');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'photo_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if (User::where('username', $request->username)->exists()) {
            return redirect()->route('register')->with('error', 'Username sudah ada');
        }

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($request->hasFile('photo_profile')) {
            $file = $request->file('photo_profile');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('photo_profile', $filename, 'public');
            $user->photo_profile_path = 'storage/' . $path;
        }

        $user->save();

        return redirect()->route('login.index')->with('success', 'Berhasil mendaftar');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'photo_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'password' => 'nullable',
        ]);

        try {
            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }
            if ($request->hasFile('photo_profile')) {
                if ($user->photo_profile_path) {
                    \Storage::disk('public')->delete(str_replace('storage/', '', $user->photo_profile_path));
                }
                $file = $request->file('photo_profile');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('photo_profile', $filename, 'public');
                $user->photo_profile_path = 'storage/' . $path;
            }

            $user->save();

            return redirect()->route('dashboard.profile')->with('success', 'Berhasil mengubah profile');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.profile')->with('error', 'Gagal mengubah profile: ' . $e->getMessage());
        }
    }
}
