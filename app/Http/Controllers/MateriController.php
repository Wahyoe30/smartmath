<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::all();
        $kelase = Kelas::all();
        return view('materis.index', compact('materi','kelase'));
    }

    public function create()
    {
        $kelase = Kelas::all();
        return view('materis.create', compact('kelase'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required|integer',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'file_path' => 'required|file|mimes:pdf|max:2048',
        ]);

        $file_path = $request->file('file_path')->store('public/files'); // Simpan file di storage/app/public/files

        Materi::create([
            'id_kelas' => $request->id_kelas,
            'title' => $request->title,
            'content' => $request->content,
            'file_path' => $file_path,
        ]);

        return redirect()->route('materis.index')->with('success', 'Materi berhasil ditambahkan.');
    }

    public function show(Materi $materi)
    {
        return view('materis.show', compact('materi'));
    }

    public function edit(Materi $materi)
    {
        $kelase = Kelas::all();
        return view('materis.edit', compact('materi', 'kelase'));
    }

    public function update(Request $request, Materi $materi)
    {
        $request->validate([
            'id_kelas' => 'required|integer',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'file_path' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file_path')) {
            // Hapus file lama sebelum menyimpan file yang baru
            Storage::delete($materi->file_path);

            $file_path = $request->file('file_path')->store('public/files');
            $materi->update([
                'id_kelas' => $request->id_kelas,
                'title' => $request->title,
                'content' => $request->content,
                'file_path' => $file_path,
            ]);
        } else {
            $materi->update($request->all());
        }

        return redirect()->route('materis.index')->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy(Materi $materi)
    {
        Storage::delete($materi->file_path); // Hapus file terkait sebelum menghapus record

        $materi->delete();

        return redirect()->route('materis.index')->with('success', 'Materi berhasil dihapus.');
    }
}
