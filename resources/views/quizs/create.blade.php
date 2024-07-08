@extends('layouts.app')
@section('title', 'Tambah Quiz')

@section('content')
    <div class="container">
        <div class="col-md-12 p-2">
            <h2 class="pt-3 pb-4 text-left font-bold font-up deep-purple-text">
                <a href="{{ route('quizs.index') }}" class="btn btn-primary"><i class="bi bi-house-door"></i>
                    Back to Home </a>
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Tambah Quiz</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('quizs.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="id_materi">Materi Pelajaran</label>
                                <select name="id_materi" id="id_materi" class="form-control">
                                    @foreach ($materi as $m)
                                        <option value="{{ $m->id }}">{{ $m->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="questions">Soal</label>
                                <input type="text" class="form-control" id="questions" name="questions" required>
                            </div>
                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <input type="text" class="form-control" id="answer" name="answer" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
