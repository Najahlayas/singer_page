<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        $works = \App\Models\Work::all();
        return view('pages.works', compact('works'));
    }

// {{-- album art, Song image, album title, song title, audio url --}}
    public function store(Request $request)
    {
        // dd($request->all());
        $validSong = $request->validate([
            'album_title' => 'required|string|max:255',
            'song_title' => 'required|string|max:255',
            'album_art' => 'required|url',
            'song_image' => 'required|url',
            'audio_url' => 'required',
            // |url',
        ]);
        // dd($validSong);

        \App\Models\Work::create($validSong);
        return redirect()->back()->with('success', 'تم اضافة العمل بنجاح!');
    }
}
