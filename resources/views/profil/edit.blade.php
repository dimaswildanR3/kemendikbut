@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Profil</h5>
                    <small class="text-muted float-end">Form Edit Profil</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Judul Profil -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="judul_profil">Judul Profil</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="judul_profil" name="judul_profil" placeholder="Masukkan judul profil" value="{{ old('judul_profil', $profil->judul_profil) }}" required />
                                @error('judul_profil')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Isi Profil -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="isi_profil">Isi Profil</label>
                            <div class="col-sm-10">
                                <textarea name="isi_profil" id="isi_profil" class="form-control" rows="5" required>{{ old('isi_profil', $profil->isi_profil) }}</textarea>
                                @error('isi_profil')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Upload Gambar -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="upload_gambar">Upload Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" name="upload_gambar" id="upload_gambar" class="form-control" accept="image/*">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                                @error('upload_gambar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('profil.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
