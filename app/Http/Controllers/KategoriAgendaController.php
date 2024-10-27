<?php

// app/Http/Controllers/KategoriAgendaController.php

namespace App\Http\Controllers;

use App\Models\KategoriAgenda;
use Illuminate\Http\Request;

class KategoriAgendaController extends Controller
{
    public function index()
    {
        $kategoriAgendas = KategoriAgenda::all();
        return view('kategori_agenda.index', compact('kategoriAgendas'));
    }

    public function create()
    {
        return view('kategori_agenda.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        KategoriAgenda::create($validated);

        return redirect()->route('kategori-agenda.index')->with('success', 'Kategori agenda berhasil ditambahkan');
    }

    public function show(KategoriAgenda $kategoriAgenda)
    {
        return view('kategori_agenda.show', compact('kategoriAgenda'));
    }

    public function edit(KategoriAgenda $kategoriAgenda)
    {
        return view('kategori_agenda.edit', compact('kategoriAgenda'));
    }

    public function update(Request $request, KategoriAgenda $kategoriAgenda)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $kategoriAgenda->update($validated);

        return redirect()->route('kategori-agenda.index')->with('success', 'Kategori agenda berhasil diperbarui');
    }

    public function destroy(KategoriAgenda $kategoriAgenda)
    {
        $kategoriAgenda->delete();

        return redirect()->route('kategori-agenda.index')->with('success', 'Kategori agenda berhasil dihapus');
    }
}