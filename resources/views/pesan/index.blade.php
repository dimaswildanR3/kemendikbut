@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Daftar Pesan
                    <a href="{{ route('pesan.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Tambah Data
                    </a>
                </h5>
                <br>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Subjek</th>
                                <th>Isi</th>
                                <th>Tanggal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($pesans as $pesan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $pesan->nama }}</strong></td>
                                <td>{{ $pesan->email }}</td>
                                <td>{{ $pesan->telepon }}</td>
                                <td>{{ $pesan->subjek }}</td>
                                <td>{{ Str::limit($pesan->isi, 50) }}...</td>
                                <td>{{ $pesan->tanggal}}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#showModal{{ $pesan->id }}">
                                        <i class="bx bx-show"></i>
                                    </button>

                                    <a href="{{ route('pesan.edit', $pesan->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bx bx-pencil"></i>
                                    </a>

                                    <form action="{{ route('pesan.destroy', $pesan->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal untuk Show -->
                            <div class="modal fade" id="showModal{{ $pesan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Pesan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <strong>Nama:</strong> {{ $pesan->nama }}<br>
                                            <strong>Email:</strong> {{ $pesan->email }}<br>
                                            <strong>Telepon:</strong> {{ $pesan->telepon }}<br>
                                            <strong>Subjek:</strong> {{ $pesan->subjek }}<br>
                                            <strong>Isi:</strong> {{ $pesan->isi }}<br>
                                            <strong>Tanggal:</strong> {{ $pesan->tanggal}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
