<?php

// app/Http/Controllers/DokumenController.php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\KategoriDokumen;
use App\Models\User;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
   public function index()
{
    $dokumens = Dokumen::with('kategori', 'user')->get();
    return view('dokumen.index', compact('dokumens'));
}


    public function create()
    {
        $users = User::all(); // Fetch all users
        $kategoris = KategoriDokumen::all(); // Fetch all categories
        return view('dokumen.create', compact('users', 'kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'url' => 'required|url',
            'kategori_id' => 'required|exists:kategori_dokumen,id',
            'users_id' => 'required|exists:users,id',
        ]);
    
        // Create a new Dokumen instance
        $dokumen = new Dokumen();
        $dokumen->judul = $validated['judul'];
        $dokumen->url = $validated['url'];
        $dokumen->kategori_id = $validated['kategori_id'];
        $dokumen->users_id = $validated['users_id'];
    // dd($dokumen );
        // Save the Dokumen instance
        $dokumen->save();
    
        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil ditambahkan');
    }
    

    public function show(Dokumen $dokumen)
    {
        return view('dokumen.show', compact('dokumen'));
    }

  public function edit(Dokumen $dokumen)
{
    $kategoriDokumen = KategoriDokumen::all(); 
    $users = User::all(); 
    return view('dokumen.edit', compact('dokumen', 'kategoriDokumen', 'users'));
}



    public function update(Request $request, Dokumen $dokumen)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'url' => 'required|url',
            'kategori_id' => 'required|exists:kategori_dokumen,id',
            'users_id' => 'required|exists:users,id',
        ]);

        $dokumen->update($validated);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diperbarui');
    }

    public function destroy(Dokumen $dokumen)
    {
        $dokumen->delete();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus');
    }
}