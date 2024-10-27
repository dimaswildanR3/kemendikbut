@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Sosial Media</h5>
                    <small class="text-muted float-end">Form Edit Sosial Media</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('sosial_media.update', $sosialMedia->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nama Sosial Media -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama">Nama Sosial Media</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama sosial media" value="{{ old('nama', $sosialMedia->nama) }}" required />
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Icon Sosial Media -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="icon">Icon Sosial Media</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="Masukkan icon sosial media" value="{{ old('icon', $sosialMedia->icon) }}" required />
                                @error('icon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Warna Sosial Media -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="color">Warna Sosial Media</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="color" name="color" placeholder="Masukkan warna (hex)" value="{{ old('color', $sosialMedia->color) }}" required />
                                @error('color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- URL Sosial Media -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="url">URL Sosial Media</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control" id="url" name="url" placeholder="Masukkan URL sosial media" value="{{ old('url', $sosialMedia->url) }}" required />
                                @error('url')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('sosial_media.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
