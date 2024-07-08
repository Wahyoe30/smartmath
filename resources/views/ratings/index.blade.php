@extends('layouts.app')
@section('title', 'Daftar Pengguna')

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
                        <h2>Daftar Nilai</h2>
                        <a href="{{ route('ratings.create') }}"
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
                                    <th>Nama Pengguna</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($ratings as $r)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $r->user->fullname }}</td>
                                        <td>{{ $r->rating }}</td>
                                        <td>
                                            {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Detail</a> --}}
                                            <a href="{{ route('ratings.edit',  $r->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('ratings.destroy', $r->id) }}" method="POST" style="display: inline;"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus rating ini?');">
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
