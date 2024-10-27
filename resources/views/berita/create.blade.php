@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Berita</h5>
                    <small class="text-muted float-end">Form Tambah Berita</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Judul -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="judul">Judul Berita</label>
                            <div class="col-sm-10">
                                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                                @error('judul')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Isi -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="isi">Isi Berita</label>
                            <div class="col-sm-10">
                                <textarea name="isi" class="form-control" rows="5" required>{{ old('isi') }}</textarea>
                                @error('isi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Isi Pendukung -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="isi_p">Isi Pendukung</label>
                            <div class="col-sm-10">
                                <textarea name="isi_p" class="form-control" rows="5">{{ old('isi_p') }}</textarea>
                                @error('isi_p')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                                @error('tanggal')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Nama Kategori -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="kategori_id">Nama Kategori</label>
                            <div class="col-sm-10">
                                <select name="kategori_id" class="form-select" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategoriBerita as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Gambar -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="gambar">Upload Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" name="gambar" class="form-control" accept="image/*">
                                @error('gambar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Gambar Slider -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="img_slider">Upload Gambar Slider</label>
                            <div class="col-sm-10">
                                <input type="file" name="img_slider" class="form-control" accept="image/*">
                                @error('img_slider')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('berita.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
