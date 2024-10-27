<?php

// app/Http/Controllers/KontakController.php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::all();
        return view('kontak.index', compact('kontaks'));
    }

    public function create()
    {
        return view('kontak.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        Kontak::create($validated);

        return redirect()->route('kontak.index')->with('success', 'Kontak berhasil ditambahkan');
    }

    public function show(Kontak $kontak)
    {
        return view('kontak.show', compact('kontak'));
    }

    public function edit(Kontak $kontak)
    {
        return view('kontak.edit', compact('kontak'));
    }

    public function update(Request $request, Kontak $kontak)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        $kontak->update($validated);

        return redirect()->route('kontak.index')->with('success', 'Kontak berhasil diperbarui');
    }

    public function destroy(Kontak $kontak)
    {
        $kontak->delete();

        return redirect()->route('kontak.index')->with('success', 'Kontak berhasil dihapus');
    }
}