@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Pesan</h5>
                    <small class="text-muted float-end">Form untuk menambah pesan baru</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('pesan.store') }}" method="POST">
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

                        <!-- Email -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="email">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Telepon -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="telepon">Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" name="telepon" id="telepon" class="form-control" value="{{ old('telepon') }}" required>
                                @error('telepon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Subjek -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="subjek">Subjek</label>
                            <div class="col-sm-10">
                                <input type="text" name="subjek" id="subjek" class="form-control" value="{{ old('subjek') }}" required>
                                @error('subjek')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Isi -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="isi">Isi</label>
                            <div class="col-sm-10">
                                <textarea name="isi" id="isi" class="form-control" rows="5" required>{{ old('isi') }}</textarea>
                                @error('isi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                                @error('tanggal')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('pesan.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
