<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
        $dataPenyakit = Penyakit::select('id', 'kode_penyakit', 'nama_penyakit', 'deskripsi', 'penanganan')->get();
        return view('dashboard.penyakit.index', compact('dataPenyakit'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_penyakit' => 'required|unique:penyakit,kode_penyakit',
            'nama_penyakit' => 'required',
            'deskripsi' => 'required',
            'penanganan' => 'required',
        ]);

        Penyakit::create($request->all());

        return redirect()->route('penyakit.index')->with('success', 'Data penyakit berhasil ditambahkan.');
    }

    public function show($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        return response()->json($penyakit);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_penyakit' => 'required|unique:penyakit,kode_penyakit,' . $id,
            'nama_penyakit' => 'required',
            'deskripsi' => 'required',
            'penanganan' => 'required',
        ]);

        $penyakit = Penyakit::findOrFail($id);
        $penyakit->update($request->all());

        return redirect()->route('penyakit.index')->with('success', 'Data penyakit berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        $penyakit->delete();

        return redirect()->route('penyakit.index')->with('success', 'Data penyakit berhasil dihapus.');
    }
}
