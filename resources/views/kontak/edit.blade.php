@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Kontak</h5>
                        <small class="text-muted float-end">Form untuk mengedit kontak</small>
                    </div>
                    <div class="card-body">
                        <!-- Form to edit an existing contact -->
                        <form action="{{ route('kontak.update', $kontak->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- Use PUT method for updating -->

                            <!-- Input for Name -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nama">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama kontak" value="{{ old('nama', $kontak->nama) }}" required />
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Input for Email -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="email">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email kontak" value="{{ old('email', $kontak->email) }}" required />
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Input for Phone Number -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="no_telp">No. Telp</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan nomor telepon" value="{{ old('no_telp', $kontak->no_telp) }}" required />
                                    @error('no_telp')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Input for Address -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="alamat">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat kontak" required>{{ old('alamat', $kontak->alamat) }}</textarea>
                                    @error('alamat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Form Submission Buttons -->
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('kontak.index') }}" class="btn btn-secondary ms-2">Kembali</a>
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
