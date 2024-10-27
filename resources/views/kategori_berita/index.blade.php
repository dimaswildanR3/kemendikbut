@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
<div class="container">     
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Kategori Agenda
            <!-- Tombol Tambah Data -->
            <a href="{{ route('kategori-berita.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i> Tambah Data
            </a>
        </h5>
        <br>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kategori</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($kategoriBeritas as $berita)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $berita->nama_kategori }}</strong></td>
                        <td>
                            <!-- Tombol Show -->
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#showModal{{ $berita->id }}">
                                <i class="bx bx-show"></i>
                            </button>

                            <!-- Tombol Edit -->
                            <a href="{{ route('kategori-berita.edit', $berita->id) }}" class="btn btn-sm btn-warning">
                                <i class="bx bx-pencil"></i>
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('kategori-berita.destroy', $berita->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal untuk Show -->
                    <div class="modal fade" id="showModal{{ $berita->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Kategori</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <strong>Nama Kategori:</strong> {{ $berita->nama_kategori }}
                                    <!-- Tambahkan detail lain sesuai kebutuhan -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
