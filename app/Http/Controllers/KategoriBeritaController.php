<?php

// app/Http/Controllers/KategoriBeritaController.php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $kategoriBeritas = KategoriBerita::all();
        return view('kategori_berita.index', compact('kategoriBeritas'));
    }

    public function create()
    {
        return view('kategori_berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        KategoriBerita::create($validated);

        return redirect()->route('kategori-berita.index')->with('success', 'Kategori berita berhasil ditambahkan');
    }

    public function show(KategoriBerita $kategoriBerita)
    {
        return view('kategori_berita.show', compact('kategoriBerita'));
    }

    public function edit(KategoriBerita $kategoriBerita)
    {
        return view('kategori_berita.edit', compact('kategoriBerita'));
    }

    public function update(Request $request, KategoriBerita $kategoriBerita)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategoriBerita->update($validated);

        return redirect()->route('kategori-berita.index')->with('success', 'Kategori berita berhasil diperbarui');
    }

    public function destroy(KategoriBerita $kategoriBerita)
    {
        $kategoriBerita->delete();

        return redirect()->route('kategori-berita.index')->with('success', 'Kategori berita berhasil dihapus');
    }
}