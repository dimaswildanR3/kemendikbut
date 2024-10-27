@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container">
            <div class="card">
                <h5 class="card-header d-flex justify-content-between align-items-center">
                    Daftar Deskripsi Sistem
                    <a href="{{ route('deskripsi_sistem.create') }}" class="btn btn-primary">
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
                                <th>Alias</th>
                                <th>Deskripsi</th>
                                <th>Tahun</th>
                                <th>Nama Organisasi</th>
                                <th>Logo Frontend</th>
                                <th>Logo Backend</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach($deskripsiSistems as $deskripsiSistem)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><strong>{{ $deskripsiSistem->nama }}</strong></td>
                                <td>{{ $deskripsiSistem->alias }}</td>
                                <td>{{ Str::limit($deskripsiSistem->deskripsi, 50) }}...</td>
                                <td>{{ $deskripsiSistem->tahun }}</td>
                                <td>{{ $deskripsiSistem->nama_organisasi }}</td>
                                <td>
                                    @if($deskripsiSistem->logo_frontend)
                                        <img src="{{ asset('storage/'.$deskripsiSistem->logo_frontend) }}" class="img-fluid" alt="Logo Frontend" style="width: 50px; height: auto;">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>
                                    @if($deskripsiSistem->logo_backend)
                                        <img src="{{ asset('storage/'.$deskripsiSistem->logo_backend) }}" class="img-fluid" alt="Logo Backend" style="width: 50px; height: auto;">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#showModal{{ $deskripsiSistem->id }}">
                                        <i class="bx bx-show"></i>
                                    </button>

                                   <a href="{{ route('deskripsi_sistem.edit', $deskripsiSistem->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bx bx-pencil"></i>
                                    </a>

                                    <form action="{{ route('deskripsi_sistem.destroy', $deskripsiSistem->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal untuk Show -->
                            <div class="modal fade" id="showModal{{ $deskripsiSistem->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg"> <!-- Set the modal to be large -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detail Deskripsi Sistem</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <strong>Nama:</strong> {{ $deskripsiSistem->nama }}<br>
                                            <strong>Alias:</strong> {{ $deskripsiSistem->alias }}<br>
                                            <strong>Deskripsi:</strong> {{ $deskripsiSistem->deskripsi }}<br>
                                            <strong>Tahun:</strong> {{ $deskripsiSistem->tahun }}<br>
                                            <strong>Nama Organisasi:</strong> {{ $deskripsiSistem->nama_organisasi }}<br>
                                            
                                            <!-- Images displayed below the text -->
                                            <div class="mt-2">
                                                @if($deskripsiSistem->logo_frontend)
                                                    <strong>Logo Frontend:</strong><br>
                                                    <img src="{{ asset('storage/'.$deskripsiSistem->logo_frontend) }}" class="img-fluid" alt="Logo Frontend" style="max-width: 100%; height: auto;">
                                                @else
                                                    <span>No Frontend Logo</span>
                                                @endif
                                            </div>
                                            <div class="mt-2">
                                                @if($deskripsiSistem->logo_backend)
                                                    <strong>Logo Backend:</strong><br>
                                                    <img src="{{ asset('storage/'.$deskripsiSistem->logo_backend) }}" class="img-fluid" alt="Logo Backend" style="max-width: 100%; height: auto;">
                                                @else
                                                    <span>No Backend Logo</span>
                                                @endif
                                            </div>
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
