@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Kategori Gambar</h5>
                        <small class="text-muted float-end">Form untuk mengedit kategori gambar</small>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategori-gambar.update', $kategoriGambar->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Nama Kategori -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nama_kategori">Nama Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan nama kategori" value="{{ old('nama_kategori', $kategoriGambar->nama_kategori) }}" required />
                                    @error('nama_kategori')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- URL Gambar -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="url">URL Gambar</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" id="url" name="url" placeholder="Masukkan URL gambar" value="{{ old('url', $kategoriGambar->url) }}" required />
                                    <small class="form-text text-muted">Masukkan URL gambar yang valid (contoh: https://example.com/image.jpg).</small>
                                    @error('url')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Button Actions -->
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('kategori-gambar.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
