@extends('layouts.app')
@section('title', 'Daftar Latihan')

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
                        <h2>Daftar Latihan</h2>
                        <a href="{{ route('latihans.create') }}" class="btn btn-primary float-right">Tambah</a>
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
                                    <th>Kelas</th>
                                    <th>Soal</th>
                                    <th>Option</th>
                                    {{-- <th>Option B</th>
                                    <th>Option C</th>
                                    <th>Option D</th> --}}
                                    <th>Jawaban</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($latihan as $l)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $l->kelas->nama_kelas }}</td>
                                        <td>{{ $l->soal }}</td>
                                        <td>{{ $l->option_A}} , {{ $l->option_B }}, {{ $l->option_C }}, {{ $l->option_D }}</td>
                                        {{-- <td>{{ $l->option_B }}</td>
                                        <td>{{ $l->option_C }}</td> --}}
                                        {{-- <td>{{ $l->option_D }}</td> --}}
                                        <td>{{ $l->answer }}</td>
                                        <td>
                                            {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Detail</a> --}}
                                            <a href="{{ route('latihans.edit', $l->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('latihans.destroy', $l->id) }}" method="POST"
                                                style="display: inline;"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus daftar latihan ini?');">
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
