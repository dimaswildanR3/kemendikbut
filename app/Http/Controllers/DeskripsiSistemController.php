<?php

namespace App\Http\Controllers;

use App\Models\DeskripsiSistem;
use Illuminate\Http\Request;
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

    public function edit(DeskripsiSistem $deskripsi_sistem)
    {
        return view('deskripsi_sistem.edit', compact('deskripsi_sistem'));
    }

    public function update(Request $request, DeskripsiSistem $deskripsi_sistem)
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

    // Check if the frontend logo is uploaded, if not, retain the existing one
    if ($request->hasFile('logo_frontend')) {
        // Delete the old logo if exists
        if ($deskripsi_sistem->logo_frontend) {
            \Storage::disk('public')->delete($deskripsi_sistem->logo_frontend);
        }
        $validated['logo_frontend'] = $request->file('logo_frontend')->store('logos', 'public');
    } else {
        // If no new logo uploaded, keep the existing logo
        $validated['logo_frontend'] = $deskripsi_sistem->logo_frontend;
    }

    // Check if the backend logo is uploaded, if not, retain the existing one
    if ($request->hasFile('logo_backend')) {
        // Delete the old logo if exists
        if ($deskripsi_sistem->logo_backend) {
            \Storage::disk('public')->delete($deskripsi_sistem->logo_backend);
        }
        $validated['logo_backend'] = $request->file('logo_backend')->store('logos', 'public');
    } else {
        // If no new logo uploaded, keep the existing logo
        $validated['logo_backend'] = $deskripsi_sistem->logo_backend;
    }

    $deskripsi_sistem->update($validated);
    return redirect()->route('deskripsi_sistem.index')->with('success', 'Deskripsi sistem berhasil diperbarui');
}

    public function destroy(DeskripsiSistem $deskripsi_sistem)
    {
        // Delete logos if they exist
        if ($deskripsi_sistem->logo_frontend) {
            Storage::disk('public')->delete($deskripsi_sistem->logo_frontend);
        }
        
        if ($deskripsi_sistem->logo_backend) {
            Storage::disk('public')->delete($deskripsi_sistem->logo_backend);
        }

        $deskripsi_sistem->delete();
        return redirect()->route('deskripsi_sistem.index')->with('success', 'Deskripsi sistem berhasil dihapus');
    }

}
