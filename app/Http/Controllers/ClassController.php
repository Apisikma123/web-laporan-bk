<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    // Tampilkan semua kelas
    public function index()
    {
        $kelas = Kelas::orderBy('nama_kelas')->paginate(10);
        return view('Teacher.classes.index', compact('kelas'));
    }

    // Form tambah kelas
    public function create()
    {
        return view('Teacher.classes.create');
    }

    // Simpan kelas baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100|unique:classes'
        ]);

        Kelas::create([
            'nama_kelas' => strtoupper($request->nama_kelas)
        ]);

        return redirect()->route('Teacher.classes.index')
            ->with('success', 'Kelas berhasil ditambahkan!');
    }

    // Detail kelas
    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('Teacher.classes.show', compact('kelas'));
    }

    // Form edit kelas
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('Teacher.classes.edit', compact('kelas'));
    }

    // Update kelas
    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        
        $request->validate([
            'nama_kelas' => 'required|string|max:100|unique:classes,nama_kelas,' . $kelas->id
        ]);

        $kelas->update([
            'nama_kelas' => strtoupper($request->nama_kelas)
        ]);

        return redirect()->route('Teacher.classes.show', $kelas->id)
            ->with('success', 'Kelas berhasil diperbarui!');
    }

    // Hapus kelas
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('Teacher.classes.index')
            ->with('success', 'Kelas berhasil dihapus!');
    }
}