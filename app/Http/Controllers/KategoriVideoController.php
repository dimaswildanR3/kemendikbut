<?php

// app/Http/Controllers/KategoriVideoController.php

namespace App\Http\Controllers;

use App\Models\KategoriVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KategoriVideoController extends Controller
{
    public function index()
    {
        // Retrieve all video categories and pass to the view
        $kategoriVideos = KategoriVideo::all(); // Changed to plural
        return view('kategori_video.index', compact('kategoriVideos')); // Changed to plural
    }
    public function create()
    {
        return view('kategori_video.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'url' => 'required|url' // Validates that the input is a valid URL
        ]);

        // Create a new category video record
        KategoriVideo::create([
            'nama_kategori' => $request->nama_kategori,
            'url' => $request->url // Store the URL
        ]);

        // Redirect with success message
        return redirect()->route('kategori-video.index')->with('success', 'Kategori video berhasil ditambahkan!');
    }



    public function show(KategoriVideo $kategoriVideo)
    {
        // Show a single video category
        return view('kategori_video.show', compact('kategoriVideo'));
    }

    public function edit($id)
    {
        $kategoriVideo = KategoriVideo::findOrFail($id); // Fetch category by ID
        return view('kategori_video.edit', compact('kategoriVideo'));
    }


    public function update(Request $request, $id)
    {
        // Temukan kategori video berdasarkan id
        $kategoriVideo = KategoriVideo::findOrFail($id);

        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'url' => 'nullable|url',
        ]);

        // Perbarui detail kategori
        $kategoriVideo->nama_kategori = $request->input('nama_kategori');

        // Hanya perbarui URL jika ada
        if ($request->filled('url')) {
            $kategoriVideo->url = $request->input('url');
        }

        // Simpan perubahan
        $kategoriVideo->save();

        // Redirect dengan pesan sukses
        return redirect()->route('kategori-video.index')->with('success', 'Kategori video berhasil diperbarui.');
    }



    public function destroy($id)
    {
        $kategoriVideo = KategoriVideo::findOrFail($id);
        $kategoriVideo->delete();

        return redirect()->route('kategori-video.index')->with('success', 'Data berhasil dihapus.');
    }


}