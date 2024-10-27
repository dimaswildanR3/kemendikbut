<?php

namespace App\Http\Controllers;

use App\Models\DeskripsiSistem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class DeskripsiSistemController extends Controller
{
    public function index()
    {
        $deskripsiSistems = DeskripsiSistem::all();
        return view('deskripsi_sistem.index', compact('deskripsiSistems'));
    }

    public function create()
    {
        return view('deskripsi_sistem.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tahun' => 'required|integer',
            'nama_organisasi' => 'required|string|max:255',
            'logo_frontend' => 'nullable|image|max:2048',
            'logo_backend' => 'nullable|image|max:2048',
        ]);

        // Handle file uploads
        if ($request->hasFile('logo_frontend')) {
            $validated['logo_frontend'] = $request->file('logo_frontend')->store('logos', 'public');
        }
        
        if ($request->hasFile('logo_backend')) {
            $validated['logo_backend'] = $request->file('logo_backend')->store('logos', 'public');
        }

        DeskripsiSistem::create($validated);
        return redirect()->route('deskripsi_sistem.index')->with('success', 'Deskripsi sistem berhasil ditambahkan');
    }

    public function show(DeskripsiSistem $deskripsi_sistem)
    {
        return view('deskripsi_sistem.show', compact('deskripsi_sistem'));
    }

    public function edit($id)
    {
        $deskripsi_sistem = DeskripsiSistem::findOrFail($id);
        return view('deskripsi_sistem.edit', compact('deskripsi_sistem'));
    }
    

    public function update(Request $request, $id) // Pertahankan $id sebagai parameter
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tahun' => 'required|integer',
            'nama_organisasi' => 'required|string|max:255',
            'logo_frontend' => 'nullable|image|max:2048',
            'logo_backend' => 'nullable|image|max:2048',
        ]);
    
        // Mengambil model DeskripsiSistem berdasarkan ID
        $deskripsi_sistem = DeskripsiSistem::findOrFail($id);
    
        // Proses untuk logo_frontend
        if ($request->hasFile('logo_frontend')) {
            // Hapus logo lama jika ada
            if ($deskripsi_sistem->logo_frontend) {
                \Storage::disk('public')->delete($deskripsi_sistem->logo_frontend);
            }
            $validated['logo_frontend'] = $request->file('logo_frontend')->store('logos', 'public');
        } else {
            // Jika tidak ada logo baru yang diupload, pertahankan yang lama
            $validated['logo_frontend'] = $deskripsi_sistem->logo_frontend;
        }
    
        // Proses untuk logo_backend
        if ($request->hasFile('logo_backend')) {
            // Hapus logo lama jika ada
            if ($deskripsi_sistem->logo_backend) {
                \Storage::disk('public')->delete($deskripsi_sistem->logo_backend);
            }
            $validated['logo_backend'] = $request->file('logo_backend')->store('logos', 'public');
        } else {
            // Jika tidak ada logo baru yang diupload, pertahankan yang lama
            $validated['logo_backend'] = $deskripsi_sistem->logo_backend;
        }
    
        // Update data DeskripsiSistem
        $deskripsi_sistem->update($validated);
        return redirect()->route('deskripsi_sistem.index')->with('success', 'Deskripsi sistem berhasil diperbarui');
    }
    

public function destroy($id)
{
    $deskripsi_sistem = DeskripsiSistem::findOrFail($id);

    // Pastikan file logo_frontend ada sebelum dihapus
    if ($deskripsi_sistem->logo_frontend && Storage::disk('public')->exists($deskripsi_sistem->logo_frontend)) {
        Storage::disk('public')->delete($deskripsi_sistem->logo_frontend);
    }

    // Pastikan file logo_backend ada sebelum dihapus
    if ($deskripsi_sistem->logo_backend && Storage::disk('public')->exists($deskripsi_sistem->logo_backend)) {
        Storage::disk('public')->delete($deskripsi_sistem->logo_backend);
    }

    // Hapus data dari database
    $deskripsi_sistem->delete();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('deskripsi_sistem.index')->with('success', 'Deskripsi sistem berhasil dihapus');
}



}
