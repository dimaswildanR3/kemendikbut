<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::all();
        return view('pesan.index', compact('pesans'));
    }

    public function create()
    {
        return view('pesan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'subjek' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        Pesan::create($validated);
        return redirect()->route('pesan.index')->with('success', 'Pesan berhasil ditambahkan');
    }

    public function show(Pesan $pesan)
    {
        return view('pesan.show', compact('pesan'));
    }

    public function edit(Pesan $pesan)
    {
        return view('pesan.edit', compact('pesan'));
    }

    public function update(Request $request, Pesan $pesan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:20',
            'subjek' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $pesan->update($validated);
        return redirect()->route('pesan.index')->with('success', 'Pesan berhasil diperbarui');
    }

    public function destroy(Pesan $pesan)
    {
        $pesan->delete();
        return redirect()->route('pesan.index')->with('success', 'Pesan berhasil dihapus');
    }
}
