<?php

// app/Http/Controllers/AgendaController.php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\KategoriAgenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $kategoriAgenda = KategoriAgenda::all();
        $agendas = Agenda::all();
        return view('agenda.index', compact('agendas', 'kategoriAgenda'));
    }

    public function create()
    {
        $kategoriAgenda = KategoriAgenda::all();
        return view('agenda.create', compact('kategoriAgenda'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'lokasi' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_agenda,id',
            'users_id' => 'required|exists:users,id',
        ]);

        // Simpan data agenda
        Agenda::create($validated);

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil ditambahkan');
    }

    public function show(Agenda $agenda)
    {
        return view('agenda.show', compact('agenda'));
    }

    public function edit(Agenda $agenda)
    {
        $kategoriAgenda = KategoriAgenda::all();
        return view('agenda.edit', compact('agenda', 'kategoriAgenda'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'lokasi' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori_agenda,id',
        ]);
    
        // Temukan agenda berdasarkan ID
        $agenda = Agenda::findOrFail($id);
    
        // Update data
        $agenda->update($validatedData);
    
        // Redirect atau kembali ke index
        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diperbarui!');
    }
    
    

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus');
    }
}
