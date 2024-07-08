<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelase = Kelas::all();
        return view('kelases.index', compact('kelase'));
    }

    public function create()
    {
        return view('kelases.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelases.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function show(Kelas $kelas)
    {
        return view('kelases.show', compact('kelas'));
    }

    public function edit(Kelas $kelase)
    {
        return view('kelases.edit', compact('kelase'));
    }

    public function update(Request $request, Kelas $kelase)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
        ]);

        $kelase->update($request->all());

        return redirect()->route('kelases.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kelase)
    {
        $kelase->delete();

        return redirect()->route('kelases.index')->with('success', 'Kelas berhasil dihapus.');
    }

    // public function edit(Kelas $kelas)
    // {
    //     // $allUser = User::all();
    //     return view('kelases.edit', [
    //         'kelas' => $kelas
    //     ]);
    //     // return view('kelases.edit', compact('kelas'));
    //     // dd($user);
    // }

    // public function update(Request $request, Kelas $kelas)
    // {
    //     $request->validate([
    //         'nama_kelas' => 'required|string|max:255',
    //     ]);

    //     $kelas->update($request->all());

    //     return redirect()->route('kelases.index')->with('success', 'Data kelas berhasil diperbarui.');
    // }

    // public function destroy(Kelas $kelas)
    // {
    //     $kelas->delete();

    //     return redirect()->route('kelases.index')->with('success', 'Kelas berhasil dihapus.');
    // }
}
