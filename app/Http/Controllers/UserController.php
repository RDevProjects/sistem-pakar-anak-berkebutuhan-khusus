<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create($request->all());
        return redirect()->route('user.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'nullable',
            'role' => 'required',
            'photo_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        try {
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }
            $user->role = $request->role;
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

            return redirect()->route('user.index')->with('success', 'User updated successfully');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('user.index')->with('error', 'User failed to update');
        }

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            if ($user->photo_profile_path) {
                \Storage::disk('public')->delete(str_replace('storage/', '', $user->photo_profile_path));
            }
            $user->delete();
            return redirect()->route('user.index')->with('success', 'User deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with('error', 'User failed to delete');
        }
    }
}
