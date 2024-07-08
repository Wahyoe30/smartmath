@extends('layouts.app')
@section('title', 'Daftar Materi')

@section('content')
    <div class="container">
        <div class="col-md-12 p-2">
            <h2 class="pt-3 pb-4 text-left font-bold font-up deep-purple-text">
                <a href="/dashboard" class="btn btn-primary"><i class="bi bi-house-door"></i>
                    Back to
                    Home </a>
            </h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Daftar Materi</h2>
                        <a href="{{ route('materis.create') }}"
                        class="btn btn-primary float-right">Tambah</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Judul Materi</th>
                                    <th>Isi</th>
                                    {{-- <th>File</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($materi as $m)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $m->kelas->nama_kelas }}</td>
                                        <td>{{ $m->title }}</td>
                                        <td>{{ $m->content }}</td>
                                        {{-- <td>{{ $m->file_path }}</td> --}}
                                        <td>
                                            {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Detail</a> --}}
                                            <a href="{{ route('materis.edit',  $m->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('materis.destroy', $m->id) }}" method="POST" style="display: inline;"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus materi ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
