@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Deskripsi Sistem</h5>
                    <small class="text-muted float-end">Form untuk menambah deskripsi sistem baru</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('deskripsi_sistem.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Alias -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="alias">Alias</label>
                            <div class="col-sm-10">
                                <input type="text" name="alias" id="alias" class="form-control" value="{{ old('alias') }}" required>
                                @error('alias')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required>{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Tahun -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="tahun">Tahun</label>
                            <div class="col-sm-10">
                                <input type="number" name="tahun" id="tahun" class="form-control" value="{{ old('tahun') }}" required>
                                @error('tahun')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Nama Organisasi -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama_organisasi">Nama Organisasi</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_organisasi" id="nama_organisasi" class="form-control" value="{{ old('nama_organisasi') }}" required>
                                @error('nama_organisasi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Logo Frontend -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="logo_frontend">Logo Frontend</label>
                            <div class="col-sm-10">
                                <input type="file" name="logo_frontend" id="logo_frontend" class="form-control" accept="image/*">
                                @error('logo_frontend')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Logo Backend -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="logo_backend">Logo Backend</label>
                            <div class="col-sm-10">
                                <input type="file" name="logo_backend" id="logo_backend" class="form-control" accept="image/*">
                                @error('logo_backend')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('deskripsi_sistem.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
