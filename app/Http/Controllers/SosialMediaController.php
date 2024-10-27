<?php

namespace App\Http\Controllers;

use App\Models\SosialMedia;
use Illuminate\Http\Request;

class SosialMediaController extends Controller
{
    public function index()
    {
        $sosialMedia = SosialMedia::all();
        return view('sosial_media.index', compact('sosialMedia'));
    }

    public function create()
    {
        return view('sosial_media.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'color' => 'required|string|max:7', // Assuming hex color code
            'url' => 'required|url|max:255',
        ]);

        SosialMedia::create($validated);
        return redirect()->route('sosial_media.index')->with('success', 'Sosial Media berhasil ditambahkan');
    }

    public function show(SosialMedia $sosialMedia)
    {
        return view('sosial_media.show', compact('sosialMedia'));
    }

    public function edit(SosialMedia $sosialMedia)
    {
        return view('sosial_media.edit', compact('sosialMedia'));
    }

    public function update(Request $request, SosialMedia $sosialMedia)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'color' => 'required|string|max:7',
            'url' => 'required|url|max:255',
        ]);

        $sosialMedia->update($validated);
        return redirect()->route('sosial_media.index')->with('success', 'Sosial Media berhasil diperbarui');
    }

    public function destroy(SosialMedia $sosialMedia)
    {
        $sosialMedia->delete();
        return redirect()->route('sosial_media.index')->with('success', 'Sosial Media berhasil dihapus');
    }
}
