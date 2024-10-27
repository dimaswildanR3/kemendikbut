@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Kontak
                    <a href="{{ route('kontak.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus"></i> Tambah Kontak
                    </a>
                </h5>

                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No. Telp</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($kontaks as $kontak)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kontak->nama }}</td>
                                <td>{{ $kontak->email }}</td>
                                <td>{{ $kontak->no_telp }}</td>
                                <td>{{ $kontak->alamat }}</td>
                                <td>
                                    <!-- Tombol untuk menampilkan modal detail -->
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#showModal{{ $kontak->id }}">
                                        <i class="bx bx-show"></i>
                                    </button>
                                    <!-- Tombol untuk mengedit data -->
                                    <a href="{{ route('kontak.edit', $kontak->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bx bx-pencil"></i>
                                    </a>
                                    <!-- Form untuk menghapus data -->
                                    <form action="{{ route('kontak.destroy', $kontak->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal untuk menampilkan detail kontak -->
                            <div class="modal fade" id="showModal{{ $kontak->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $kontak->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel{{ $kontak->id }}">Detail Kontak</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <strong>Nama:</strong> {{ $kontak->nama }}
                                            <br>
                                            <strong>Email:</strong> {{ $kontak->email }}
                                            <br>
                                            <strong>No. Telp:</strong> {{ $kontak->no_telp }}
                                            <br>
                                            <strong>Alamat:</strong> {{ $kontak->alamat }}
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
