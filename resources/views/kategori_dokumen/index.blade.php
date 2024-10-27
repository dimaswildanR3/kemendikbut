@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Kategori Dokumen
                    <a href="{{ route('kategori-dokumen.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Tambah Data
                    </a>
                </h5>

                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>User</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($kategoriDokumens as $kategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $kategori->nama_kategori }}</strong></td>
                                <td>{{ $kategori->user->name }}</td> <!-- Display the user who created the category -->
                                <td>
                                    <!-- Show details button -->
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#showModal{{ $kategori->id }}">
                                        <i class="bx bx-show"></i>
                                    </button>
                                    <!-- Edit button -->
                                    <a href="{{ route('kategori-dokumen.edit', $kategori->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bx bx-pencil"></i>
                                    </a>
                                    <!-- Delete form -->
                                    <form action="{{ route('kategori-dokumen.destroy', $kategori->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal for Show -->
                            <div class="modal fade" id="showModal{{ $kategori->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $kategori->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel{{ $kategori->id }}">Detail Kategori Dokumen</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <strong>Nama Kategori:</strong> {{ $kategori->nama_kategori }}
                                            <br>
                                            <strong>Nama User:</strong> {{ $kategori->user->name }}
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
