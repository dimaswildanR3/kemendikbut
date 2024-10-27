<?php

namespace App\Http\Controllers;

use App\Models\KategoriGambar;
use Illuminate\Http\Request;

class KategoriGambarController extends Controller
{
    public function index()
    {
        $kategoriGambar = KategoriGambar::all();
        return view('kategori_gambar.index', compact('kategoriGambar'));
    }

    public function create()
    {
        return view('kategori_gambar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'url' => 'required|url', // Menyimpan URL gambar langsung, tidak melalui upload
        ]);

        KategoriGambar::create($validated);

        return redirect()->route('kategori-gambar.index')->with('success', 'Kategori gambar berhasil ditambahkan');
    }

    public function show(KategoriGambar $kategoriGambar)
    {
        return view('kategori_gambar.show', compact('kategoriGambar'));
    }

    public function edit(KategoriGambar $kategoriGambar)
    {
        return view('kategori_gambar.edit', compact('kategoriGambar'));
    }

    public function update(Request $request, KategoriGambar $kategoriGambar)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'url' => 'nullable|url', // Validasi bahwa input adalah URL
        ]);

        $kategoriGambar->update($validated);

        return redirect()->route('kategori-gambar.index')->with('success', 'Kategori gambar berhasil diperbarui');
    }

    public function destroy(KategoriGambar $kategoriGambar)
    {
        $kategoriGambar->delete();

        return redirect()->route('kategori-gambar.index')->with('success', 'Kategori gambar berhasil dihapus');
    }
}
