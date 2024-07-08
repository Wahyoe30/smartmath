<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::all();
        return view('ratings.index', compact('ratings'));
    }

    public function create()
    {
        $users = User::all();
        return view('ratings.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'rating' => 'required|integer',
        ]);

        Rating::create($request->all());

        return redirect()->route('ratings.index')->with('success', 'Rating berhasil ditambahkan.');
    }

    public function show(Rating $rating)
    {
        return view('ratings.show', compact('rating'));
    }

    public function edit(Rating $rating)
    {
        $users = User::all();
        return view('ratings.edit', compact('rating', 'users'));
    }

    public function update(Request $request, Rating $rating)
    {
        $request->validate([
            'id_user' => 'required|integer',
            'rating' => 'required|integer',
        ]);

        $rating->update($request->all());

        return redirect()->route('ratings.index')->with('success', 'Rating berhasil diperbarui.');
    }

    public function destroy(Rating $rating)
    {
        $rating->delete();

        return redirect()->route('ratings.index')->with('success', 'Rating berhasil dihapus.');
    }
}
