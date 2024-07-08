@extends('layouts.app')
@section('title', 'Tambah Kelas')

@section('content')
    <div class="container">
        <div class="col-md-12 p-2">
            <h2 class="pt-3 pb-4 text-left font-bold font-up deep-purple-text">
                <a href="{{ route('kelases.index') }}" class="btn btn-primary"><i class="bi bi-house-door"></i>
                    Back to
                    Home </a>
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Tambah Kelas</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kelases.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="fullname">Nama Kelas</label>
                                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
