@extends('layouts.app')

@section('title', 'Edit Materi')

@section('content')
    <div class="container">
        <div class="col-md-12 p-2">
            <h2 class="pt-3 pb-4 text-left font-bold font-up deep-purple-text">
                <a href="{{ route('materis.index') }}" class="btn btn-primary"><i class="bi bi-house-door"></i> Back to Home </a>
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Materi</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('materis.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_kelas">Kelas</label>
                                <select name="id_kelas" id="id_kelas" class="form-control">
                                    @foreach ($kelase as $k)
                                        <option value="{{ $k->id }}" @if ($materi->id_kelas == $k->id) selected @endif>{{ $k->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Judul Materi</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $materi->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Isi Materi</label>
                                <textarea class="form-control" id="content" name="content" rows="5" required>{{ $materi->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="file_path">Ganti File Materi (PDF)</label>
                                <input type="file" class="form-control-file" id="file_path" name="file_path" accept=".pdf">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
