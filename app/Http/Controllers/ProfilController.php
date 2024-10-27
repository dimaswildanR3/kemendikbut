<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profils = Profil::all();
        return view('profil.index', compact('profils'));
    }

    public function create()
    {
        return view('profil.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_profil' => 'required|string|max:255',
            'isi_profil' => 'required|string',
            'upload_gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('upload_gambar')) {
            $validated['upload_gambar'] = $request->file('upload_gambar')->store('images', 'public');
        }

        Profil::create($validated);

        return redirect()->route('profil.index')->with('success', 'Profil berhasil ditambahkan');
    }

    public function show(Profil $profil)
    {
        return view('profil.show', compact('profil'));
    }

    public function edit(Profil $profil)
    {
        return view('profil.edit', compact('profil'));
    }

public function update(Request $request, Profil $profil)
{
    $validated = $request->validate([
        'judul_profil' => 'required|string|max:255',
        'isi_profil' => 'required|string',
        'upload_gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    // Check if a new image is uploaded
    if ($request->hasFile('upload_gambar')) {
        // Hapus gambar lama jika ada
        if ($profil->upload_gambar) {
            \Storage::disk('public')->delete($profil->upload_gambar);
        }
        // Store new image
        $validated['upload_gambar'] = $request->file('upload_gambar')->store('images', 'public');
    } else {
        // If no new image is uploaded, check if there is an existing image
        if ($profil->upload_gambar) {
            // Delete the existing image if there is no new image
            \Storage::disk('public')->delete($profil->upload_gambar);
            // Set upload_gambar to null to remove the old image reference
            $validated['upload_gambar'] = null;
        } else {
            // If there's no existing image, keep the upload_gambar key unset
            unset($validated['upload_gambar']);
        }
    }

    // Update the profil with the validated data
    $profil->update($validated);

    return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui');
}




    public function destroy(Profil $profil)
    {
        if ($profil->upload_gambar) {
            \Storage::disk('public')->delete($profil->upload_gambar);
        }
        
        $profil->delete();
        return redirect()->route('profil.index')->with('success', 'Profil berhasil dihapus');
    }
}
