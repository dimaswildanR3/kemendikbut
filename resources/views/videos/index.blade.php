@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="container">
                <div class="card">
                    <h5 class="card-header d-flex justify-content-between align-items-center">
                        Video
                        <a href="{{ route('video.create') }}" class="btn btn-primary">
                            <i class="bx bx-plus"></i> Tambah Data
                        </a>
                    </h5>

                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Judul Video</th>
                                    <th>Video URL</th>
                                    <th>Kategori</th> <!-- Added Kategori -->
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($videos as $video)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><strong>{{ $video->judul }}</strong></td>
                                        <td>
                                            <a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a>
                                        </td>
                                        <td>
                                            {{ $video->kategori->nama_kategori ?? 'N/A' }} <!-- Display category name -->
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                data-bs-target="#showModal{{ $video->id }}">
                                                <i class="bx bx-show"></i>
                                            </button>
                                            <a href="{{ route('video.edit', $video->id) }}" class="btn btn-sm btn-warning">
                                                <i class="bx bx-pencil"></i>
                                            </a>
                                            <form action="{{ route('video.destroy', $video->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal untuk Show -->
                                    <div class="modal fade" id="showModal{{ $video->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Video</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <!-- Change from text-center to text-start -->
                                                    <strong>Judul Video:</strong> {{ $video->judul }}
                                                    <br>
                                                    <strong>Video URL:</strong>
                                                    <a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a>
                                                    <br>
                                                    <strong>Kategori:</strong>
                                                    {{ $video->kategori->nama_kategori ?? 'N/A' }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
