@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Sosial Media</h5>
                    <small class="text-muted float-end">Form untuk menambah sosial media baru</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('sosial_media.store') }}" method="POST">
                        @csrf

                        <!-- Nama Sosial Media -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama">Nama Sosial Media</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Icon -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="icon">Icon</label>
                            <div class="col-sm-10">
                                <input type="text" name="icon" id="icon" class="form-control" value="{{ old('icon') }}" required>
                                @error('icon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Warna -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="color">Warna</label>
                            <div class="col-sm-10">
                                <input type="text" name="color" id="color" class="form-control" value="{{ old('color') }}" required>
                                @error('color')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- URL -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="url">URL</label>
                            <div class="col-sm-10">
                                <input type="url" name="url" id="url" class="form-control" value="{{ old('url') }}" required>
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
