<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;

class KegiatanController extends Controller
{
    /**
     * Tampilkan semua kegiatan
     */
    public function index()
    {
        $kegiatans = Kegiatan::orderBy('tanggal_mulai', 'asc')->get();
        return view('kegiatan.index', compact('kegiatans'));
    }

    /**
     * Tampilkan form tambah kegiatan baru
     */
    public function create()
    {
        return view('kegiatan.create'); // pastikan ada resources/views/kegiatan/create.blade.php
    }

    /**
     * Simpan kegiatan baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kegiatan' => 'required|string|max:255',
            'status' => 'required|in:Not Started,In Progress,Blocked,Completed',
            'penanggung_jawab' => 'required|string|max:255',
            'peserta_kegiatan' => 'nullable|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
            'tempat_kegiatan' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        Kegiatan::create($validated);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit kegiatan
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.edit', compact('kegiatan')); // gunakan edit.blade.php
    }

    /**
     * Update kegiatan
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kegiatan' => 'required|string|max:255',
            'status' => 'required|in:Not Started,In Progress,Blocked,Completed',
            'penanggung_jawab' => 'required|string|max:255',
            'peserta_kegiatan' => 'nullable|string|max:255',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date',
            'tempat_kegiatan' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update($validated);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diupdate!');
    }

    /**
     * Hapus kegiatan
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->back()->with('success', 'Kegiatan berhasil dihapus!');
    }

    /**
     * Inline update untuk contenteditable / AJAX
     */
    public function inlineUpdate(Request $request, $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);

        $field = $request->field;
        $value = $request->value;

        $allowed = [
            'kegiatan',
            'status',
            'penanggung_jawab',
            'peserta_kegiatan',
            'tanggal_mulai',
            'tanggal_selesai',
            'tempat_kegiatan',
            'notes',
        ];

        if (!in_array($field, $allowed)) {
            return response()->json(['error' => 'Field tidak valid'], 400);
        }

        if ($field === 'status' && !in_array($value, ['Not Started', 'In Progress', 'Blocked', 'Completed'])) {
            return response()->json(['error' => 'Status tidak valid'], 400);
        }

        $kegiatan->$field = $value;
        $kegiatan->save();

        return response()->json(['success' => true]);
    }
}
