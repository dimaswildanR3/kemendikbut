@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Pesan</h5>
                    <small class="text-muted float-end">Form Edit Pesan</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('pesan.update', $pesan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nama -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" value="{{ old('nama', $pesan->nama) }}" required />
                                @error('nama')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="email">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" value="{{ old('email', $pesan->email) }}" required />
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Telepon -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="telepon">Telepon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan telepon" value="{{ old('telepon', $pesan->telepon) }}" required />
                                @error('telepon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Subjek -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="subjek">Subjek</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="subjek" name="subjek" placeholder="Masukkan subjek" value="{{ old('subjek', $pesan->subjek) }}" required />
                                @error('subjek')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Isi -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="isi">Isi</label>
                            <div class="col-sm-10">
                                <textarea name="isi" id="isi" class="form-control" rows="5" required>{{ old('isi', $pesan->isi) }}</textarea>
                                @error('isi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $pesan->tanggal) }}" required />
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
