@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Agenda</h5>
                        <small class="text-muted float-end">Form Edit Agenda</small>
                    </div>
                    <div class="card-body">
                        <!-- Form untuk edit agenda -->
                        <form action="{{ route('agenda.update', $agenda->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- Ini penting untuk method PUT -->

                            <!-- Judul -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="judul">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $agenda->judul) }}">
                                    @error('judul')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Tanggal -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tanggal">Tanggal</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $agenda->tanggal->format('Y-m-d')) }}">
                                    @error('tanggal')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Waktu Mulai -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="waktu_mulai">Waktu Mulai</label>
                                <div class="col-sm-10">
                                    <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai', $agenda->waktu_mulai) }}">
                                    @error('waktu_mulai')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Waktu Selesai -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="waktu_selesai">Waktu Selesai</label>
                                <div class="col-sm-10">
                                    <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai', $agenda->waktu_selesai) }}">
                                    @error('waktu_selesai')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Lokasi -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="lokasi">Lokasi</label>
                                <div class="col-sm-10">
                                    <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi', $agenda->lokasi) }}">
                                    @error('lokasi')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Kategori -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="kategori_id">Kategori</label>
                                <div class="col-sm-10">
                                    <select name="kategori_id" class="form-select">
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($kategoriAgenda as $kategori)
                                            <option value="{{ $kategori->id }}" {{ (old('kategori_id', $agenda->kategori_id) == $kategori->id) ? 'selected' : '' }}>
                                                {{ $kategori->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('kategori_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('agenda.index') }}" class="btn btn-secondary ms-2">Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
