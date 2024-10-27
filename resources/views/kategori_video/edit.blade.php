@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="container">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Edit Kategori Video</h5>
                            <small class="text-muted float-end">Form untuk mengedit kategori video</small>
                        </div>
                        <div class="card-body">
                            <!-- Success message -->
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <!-- Validation Errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('kategori-video.update', $kategoriVideo->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="nama_kategori">Nama Kategori</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                                            placeholder="Masukkan nama kategori"
                                            value="{{ old('nama_kategori', $kategoriVideo->nama_kategori) }}" required />
                                        @error('nama_kategori')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="url">URL Video</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" id="url" name="url"
                                            placeholder="Masukkan URL video" value="{{ old('url', $kategoriVideo->url) }}"
                                            required />
                                        <small class="form-text text-muted">Masukkan URL video yang valid (contoh:
                                            https://example.com/video.mp4).</small>
                                        @error('url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('kategori-video.index') }}"
                                            class="btn btn-secondary ms-2">Kembali</a>
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
