<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;

class GejalaController extends Controller
{
    public function index()
    {
        $dataGejala = Gejala::select('id', 'kode_gejala', 'deskripsi')->get();
        return view('dashboard.gejala.index', compact('dataGejala'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_gejala' => 'required|unique:gejala,kode_gejala',
            'deskripsi' => 'required',
        ]);

        Gejala::create($request->all());

        return redirect()->route('gejala.index')->with('success', 'Data gejala berhasil ditambahkan.');
    }

    public function show($id)
    {
        $gejala = Gejala::findOrFail($id);
        return response()->json($gejala);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_gejala' => 'required|unique:gejala,kode_gejala,' . $id,
            'deskripsi' => 'required',
        ]);

        $gejala = Gejala::findOrFail($id);
        $gejala->update($request->all());

        return redirect()->route('gejala.index')->with('success', 'Data gejala berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $gejala = Gejala::findOrFail($id);
        $gejala->delete();

        return redirect()->route('gejala.index')->with('success', 'Data gejala berhasil dihapus.');
    }
}
