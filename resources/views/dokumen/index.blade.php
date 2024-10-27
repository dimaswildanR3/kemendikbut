@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Dokumen
                    <a href="{{ route('dokumen.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Tambah Data
                    </a>
                </h5>

                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>URL</th>
                                <th>Kategori</th>
                                <th>User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($dokumens as $dokumen)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $dokumen->judul }}</strong></td>
                                <td><a href="{{ $dokumen->url }}" target="_blank">{{ $dokumen->url }}</a></td>
                                <td>{{ $dokumen->kategori->nama_kategori }}</td>
                                <td>{{ $dokumen->user->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#showModal{{ $dokumen->id }}">
                                        <i class="bx bx-show"></i>
                                    </button>
                                    <a href="{{ route('dokumen.edit', $dokumen->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bx bx-pencil"></i>
                                    </a>
                                    <form action="{{ route('dokumen.destroy', $dokumen->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal for Show -->
                            <div class="modal fade" id="showModal{{ $dokumen->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $dokumen->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel{{ $dokumen->id }}">Detail Dokumen</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <strong>Judul:</strong> {{ $dokumen->judul }}
                                            <br>
                                            <strong>URL:</strong> <a href="{{ $dokumen->url }}" target="_blank">{{ $dokumen->url }}</a>
                                            <br>
                                            <strong>Kategori:</strong> {{ $dokumen->kategori->nama_kategori }}
                                            <br>
                                            <strong>Nama User:</strong> {{ $dokumen->user->name }}
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
