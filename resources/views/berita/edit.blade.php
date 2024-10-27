@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Berita</h5>
                    <small class="text-muted float-end">Form Edit Berita</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Penting untuk method PUT -->

                        <!-- Judul -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="judul">Judul Berita</label>
                            <div class="col-sm-10">
                                <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $berita->judul) }}" required>
                                @error('judul')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Isi -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="isi">Isi Berita</label>
                            <div class="col-sm-10">
                                <textarea name="isi" id="isi" class="form-control" rows="5" required>{{ old('isi', $berita->isi) }}</textarea>
                                @error('isi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', $berita->tanggal) }}" required>
                                @error('tanggal')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Nama Kategori -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="kategori_id">Nama Kategori</label>
                            <div class="col-sm-10">
                                <select name="kategori_id" id="kategori_id" class="form-select" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategoriBerita as $kategori)
                                        <option value="{{ $kategori->id }}" {{ $berita->kategori_id == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}
                                        </option>
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
                                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                                @error('gambar')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Menampilkan Gambar yang Sudah Ada -->
                        @if ($berita->gambar)
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Gambar Sebelumnya</label>
                                <div class="col-sm-10">
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            </div>
                        @endif

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
