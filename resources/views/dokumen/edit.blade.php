@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="container">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Edit Dokumen</h5>
                            <small class="text-muted float-end">Form untuk mengedit dokumen</small>
                        </div>
                        <div class="card-body">
                            <!-- Form action for updating the document -->
                            <form action="{{ route('dokumen.update', $dokumen->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Required for updating -->

                                <!-- Judul Dokumen Field -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="judul">Judul Dokumen</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul dokumen" value="{{ old('judul', $dokumen->judul) }}" required />
                                        @error('judul')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- URL Dokumen Field -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="url">URL Dokumen</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" id="url" name="url" placeholder="Masukkan URL dokumen" value="{{ old('url', $dokumen->url) }}" required />
                                        @error('url')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Pilih Kategori Field -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="kategori_id">Pilih Kategori</label>
                                    <div class="col-sm-10">
                                        <select name="kategori_id" id="kategori_id" class="form-select" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach ($kategoriDokumen as $kategori)
                                                <option value="{{ $kategori->id }}" {{ old('kategori_id', $dokumen->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                                    {{ $kategori->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Pilih User Field -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="users_id">Pilih User</label>
                                    <div class="col-sm-10">
                                        <select name="users_id" id="users_id" class="form-select" required>
                                            <option value="">-- Pilih User --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ old('users_id', $dokumen->users_id) == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('users_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('dokumen.index') }}" class="btn btn-secondary ms-2">Kembali</a>
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
