<?php

namespace App\Http\Controllers;

use App\Models\KategoriVideo;
use App\Models\User; 
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the videos.
     */
    public function index()
    {
        $videos = Video::all(); // Fetch all videos
        return view('videos.index', compact('videos')); // Pass videos to the index view
    }

public function create()
{
    $kategoris = KategoriVideo::all(); // Fetch all categories
    $users = User::all(); // Fetch all users
    return view('videos.create', compact('kategoris', 'users')); // Pass the categories and users to the view
}

    
    /**
     * Store a newly created video in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate request data
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'url' => 'required|url',
            'kategori_id' => 'required', // Validate that the category exists
            'users_id' => 'required|exists:users,id', // Validate that the user exists if needed
        ]);
    
        // Create a new video record in the database
        Video::create($validated);

        return redirect()->route('video.index')->with('success', 'Video created successfully!');
    }

    /**
     * Display the specified video.
     */
    public function show($id)
    {
        $video = Video::findOrFail($id); // Fetch the video by ID
        return view('videos.show', compact('video')); // Show the video details
    }

    /**
     * Show the form for editing the specified video.
     */
    public function edit($id)
    {
         $video = Video::findOrFail($id); // Fetch the video by ID
        $kategoris = KategoriVideo::all(); // Fetch all categories
        $users = User::all(); // Fetch all users
        return view('videos.edit', compact('video', 'kategoris', 'users'));// Show form to edit the video
    }

    /**
     * Update the specified video in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate request data
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'url' => 'required|url',
            'kategori_id' => 'required', // Validate that the category exists
            'users_id' => 'required|exists:users,id', // Validate that the user exists if needed
        ]);

        // Update the video record in the database
        $video = Video::findOrFail($id);
        $video->update($validated);

        return redirect()->route('video.index')->with('success', 'Video updated successfully!');
    }

    /**
     * Remove the specified video from storage.
     */
    public function destroy($id)
    {
        // Delete the video from the database
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('video.index')->with('success', 'Video deleted successfully!');
    }
}