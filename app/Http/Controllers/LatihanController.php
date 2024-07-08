<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Latihan;
use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index()
    {
        $latihan = Latihan::all();
        return view('latihans.index', compact('latihan'));
    }

    public function create()
    {
        $kelase = Kelas::all();
        return view('latihans.create', compact('kelase'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kelas' => 'required|integer',
            'soal' => 'required|string',
            'option_A' => 'required|string',
            'option_B' => 'required|string',
            'option_C' => 'required|string',
            'option_D' => 'required|string',
            'answer' => 'required|string|max:250',
        ]);

        Latihan::create($request->all());

        return redirect()->route('latihans.index')->with('success', 'Latihan berhasil ditambahkan.');
    }

    public function edit(Latihan $latihan)
    {
        $kelase = Kelas::all();
        return view('latihans.edit', compact('latihan', 'kelase'));
    }

    public function update(Request $request, Latihan $latihan)
    {
        $request->validate([
            'id_kelas' => 'required|integer',
            'soal' => 'required|string',
            'option_A' => 'required|string',
            'option_B' => 'required|string',
            'option_C' => 'required|string',
            'option_D' => 'required|string',
            'answer' => 'required|string|max:250',
        ]);

        $latihan->update($request->all());

        return redirect()->route('latihans.index')->with('success', 'Latihan berhasil diperbarui.');
    }

    public function destroy(Latihan $latihan)
    {
        $latihan->delete();

        return redirect()->route('latihans.index')->with('success', 'Latihan berhasil dihapus.');
    }
}
