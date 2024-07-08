@extends('layouts.app')
@section('title', 'Edit Latihan')

@section('content')
    <div class="container">
        <div class="col-md-12 p-2">
            <h2 class="pt-3 pb-4 text-left font-bold font-up deep-purple-text">
                <a href="{{ route('latihans.index') }}" class="btn btn-primary"><i class="bi bi-house-door"></i>
                    Back to Home </a>
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Latihan</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('latihans.update', $latihan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_kelas">Kelas</label>
                                <select name="id_kelas" class="form-control">
                                    @foreach ($kelase as $kelas)
                                        <option value="{{ $kelas->id }}" {{ $latihan->id_kelas == $kelas->id ? 'selected' : '' }}>{{ $kelas->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="soal">Soal</label>
                                <input type="text" class="form-control" id="soal" name="soal" value="{{ $latihan->soal }}" required>
                            </div>
                            <div class="form-group">
                                <label for="option_A">Option A</label>
                                <input type="text" class="form-control" id="option_A" name="option_A" value="{{ $latihan->option_A }}" required>
                            </div>
                            <div class="form-group">
                                <label for="option_B">Option B</label>
                                <input type="text" class="form-control" id="option_B" name="option_B" value="{{ $latihan->option_B }}" required>
                            </div>
                            <div class="form-group">
                                <label for="option_C">Option C</label>
                                <input type="text" class="form-control" id="option_C" name="option_C" value="{{ $latihan->option_C }}" required>
                            </div>
                            <div class="form-group">
                                <label for="option_D">Option D</label>
                                <input type="text" class="form-control" id="option_D" name="option_D" value="{{ $latihan->option_D }}" required>
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <input type="text" class="form-control" id="answer" name="answer" value="{{ $latihan->answer }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
