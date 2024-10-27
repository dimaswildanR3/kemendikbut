@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tambah Bidang</h5>
                    <small class="text-muted float-end">Form untuk menambah bidang baru</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('bidang.store') }}" method="POST">
                        @csrf

                        <!-- Nama Bidang -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="nama_bidang">Nama Bidang</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_bidang" id="nama_bidang" class="form-control" value="{{ old('nama_bidang') }}" required>
                                @error('nama_bidang')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('bidang.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
