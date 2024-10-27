@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Tambah Video</h5>
                        <small class="text-muted float-end">Form untuk menambahkan video baru</small>
                    </div>
                    <div class="card-body">
                        <!-- Success message -->
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <!-- Validation Errors -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('video.store') }}" method="POST">
                            @csrf

                            <!-- Input for Video Title -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="judul">Judul Video</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul video" value="{{ old('judul') }}" required />
                                    @error('judul')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Input for Video URL -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="url">URL Video</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" id="url" name="url" required placeholder="Masukkan URL video" value="{{ old('url') }}" />
                                    <small class="form-text text-muted">Masukkan URL video yang valid (contoh: https://example.com/video.mp4).</small>
                                    @error('url')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Select for Category -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="kategori_id">Kategori</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="kategori_id" name="kategori_id" required>
                                        <option value="" disabled selected>Pilih Kategori</option> <!-- Placeholder -->
                                        @foreach($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Select for Users -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="users_id">Pengguna</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="users_id" name="users_id" required>
                                        <option value="" disabled selected>Pilih Pengguna</option> <!-- Placeholder -->
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ old('users_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('users_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('video.index') }}" class="btn btn-secondary ms-2">Kembali</a>
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
