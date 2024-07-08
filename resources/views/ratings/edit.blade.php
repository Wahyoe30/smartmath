@extends('layouts.app')
@section('title', 'Edit Nilai')

@section('content')
    <div class="container">
        <div class="col-md-12 p-2">
            <h2 class="pt-3 pb-4 text-left font-bold font-up deep-purple-text">
                <a href="{{ route('ratings.index') }}" class="btn btn-primary"><i class="bi bi-house-door"></i> Back to Home </a>
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Nilai</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ratings.update', $rating->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_user">Nama Pengguna</label>
                                <select name="id_user" id="id_user" class="form-control" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $user->id == $rating->id_user ? 'selected' : '' }}>
                                            {{ $user->fullname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="rating">Nilai</label>
                                <input type="number" class="form-control" id="rating" name="rating" value="{{ $rating->rating }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
