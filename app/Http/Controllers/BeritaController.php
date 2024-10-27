<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function __construct()
    {
        // Tambahkan middleware auth agar semua fungsi diakses hanya oleh pengguna yang sudah login
        $this->middleware('auth');
    }

    public function index()
    {
        $beritas = Berita::all();
        return view('berita.index', compact('beritas'));
    }

    public function create()
    {
        $kategoriBerita = KategoriBerita::all();
        return view('berita.create', compact('kategoriBerita'));
    }

    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori_berita,id',
            'gambar' => 'nullable|image|max:2048', // Validasi gambar
        ]);
    
        // Get the selected category name
        $kategori = KategoriBerita::find($validated['kategori_id']);
        $validated['kategori_nama'] = $kategori->nama_kategori;
    
        // Handle file upload for 'gambar'
        if ($request->hasFile('gambar')) {
            // Store the image in storage/app/public/gambar
            $gambarPath = $request->file('gambar')->store('gambar', 'public'); // Specify 'public' disk
            $validated['gambar'] = $gambarPath; // Store the relative path (public/gambar/filename.jpg)
        }
        
        // Set 'users_id' and 'author' from the authenticated user
        $validated['users_id'] = Auth()->id();
        $validated['author'] = auth()->user()->name;
    
        // Create a new instance of Berita
        $berita = new Berita();
        
        // Set properties manually
        $berita->judul = $validated['judul'];
        $berita->isi = $validated['isi'];
        $berita->tanggal = $validated['tanggal'];
        $berita->kategori_id = $validated['kategori_id'];
        $berita->kategori_nama = $validated['kategori_nama'];
        $berita->gambar = $validated['gambar'] ?? null;  // Handle optional 'gambar'
        $berita->users_id = $validated['users_id'];
        $berita->author = $validated['author'];
        
        // Save the instance
        $berita->save();
        
        // Redirect with success message
        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        $kategoriBerita = KategoriBerita::all();
        return view('berita.edit', compact('berita', 'kategoriBerita'));
    }

    public function update(Request $request, Berita $berita)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori_berita,id',
            'gambar' => 'nullable|image|max:2048', // Validasi gambar
        ]);

        // Ambil nama kategori berdasarkan kategori_id
        $kategori = KategoriBerita::find($validated['kategori_id']);
        $validated['kategori_nama'] = $kategori->nama_kategori;

        // Jika ada file gambar yang di-upload, simpan file gambar
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar'); // Simpan di storage/app/gambar
            $validated['gambar'] = $gambarPath; // Hanya simpan path relatif
        }

        // Ambil ID user yang sedang login
        $validated['users_id'] = auth()->id();

        // Update berita
        $berita->update($validated);

        // Redirect ke index berita dengan pesan sukses
        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(Berita $berita)
    {
        // Hapus berita
        $berita->delete();

        // Redirect ke index berita dengan pesan sukses
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus');
    }
}
