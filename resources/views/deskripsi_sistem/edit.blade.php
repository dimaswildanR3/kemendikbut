@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Deskripsi Sistem</h5>
                    <small class="text-muted float-end">Form Edit Deskripsi Sistem</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('deskripsi_sistem.update', $deskripsi_sistem) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" value="{{ old('nama', $deskripsi_sistem->nama) }}" required />
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Alias -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="alias">Alias</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alias" name="alias" placeholder="Masukkan alias" value="{{ old('alias', $deskripsi_sistem->alias) }}" required />
                                @error('alias')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required>{{ old('deskripsi', $deskripsi_sistem->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Tahun -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="tahun">Tahun</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Masukkan tahun" value="{{ old('tahun', $deskripsi_sistem->tahun) }}" required />
                                @error('tahun')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Nama Organisasi -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama_organisasi">Nama Organisasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_organisasi" name="nama_organisasi" placeholder="Masukkan nama organisasi" value="{{ old('nama_organisasi', $deskripsi_sistem->nama_organisasi) }}" required />
                                @error('nama_organisasi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Upload Logo Frontend -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="logo_frontend">Upload Logo Frontend</label>
                            <div class="col-sm-10">
                                <input type="file" name="logo_frontend" id="logo_frontend" class="form-control" accept="image/*">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah logo frontend.</small>
                                @error('logo_frontend')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Upload Logo Backend -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="logo_backend">Upload Logo Backend</label>
                            <div class="col-sm-10">
                                <input type="file" name="logo_backend" id="logo_backend" class="form-control" accept="image/*">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah logo backend.</small>
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
