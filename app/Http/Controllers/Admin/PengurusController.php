<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengurusController extends Controller
{
    /**
     * Tampilkan daftar pengurus
     */
    public function index()
    {
        // Cek apakah kolom 'urutan' ada, kalau nggak pakai 'id'
        $columns = \Schema::getColumnListing('pengurus');
        $orderColumn = in_array('urutan', $columns) ? 'urutan' : 'id';

        $pengurus = Pengurus::orderBy($orderColumn, 'asc')->get();
        return view('admin.pengurus.index', compact('pengurus'));
    }

    /**
     * Form tambah pengurus
     */
    public function create()
    {
        return view('admin.pengurus.create');
    }

    /**
     * Simpan pengurus baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'image|nullable|max:2048',
            'kontak' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer',
        ]);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pengurus', 'public');
        }

        Pengurus::create($validated);

        return redirect()->back()->with('success', 'Berhasil menambahkan pengurus.');
    }

    /**
     * Form edit pengurus
     */
    public function edit($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        return view('admin.pengurus.edit', compact('pengurus'));
    }

    /**
     * Update data pengurus
     */
    public function update(Request $request, $id)
    {
        $pengurus = Pengurus::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'image|nullable|max:2048',
            'kontak' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer',
        ]);

        // Hapus dan update foto lama jika ada
        if ($request->hasFile('foto')) {
            if ($pengurus->foto) {
                Storage::disk('public')->delete($pengurus->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pengurus', 'public');
        }

        $pengurus->update($validated);

        return redirect()->back()->with('success', 'Data pengurus berhasil diperbarui.');
    }

    /**
     * Hapus pengurus
     */
    public function destroy($id)
    {
        $pengurus = Pengurus::findOrFail($id);

        if ($pengurus->foto) {
            Storage::disk('public')->delete($pengurus->foto);
        }

        $pengurus->delete();

        return redirect()->back()->with('success', 'Pengurus berhasil dihapus.');
    }
}
