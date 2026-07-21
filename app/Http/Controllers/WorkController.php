<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class WorkController extends Controller
{
    public function show()
    {
        $works = Work::all();
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

        Work::create($validSong);
        return redirect()->back()->with('success', 'تم اضافة العمل بنجاح!');
    }



    public function update(Request $request )
{
    
    // return redirect('/')->with('success', 'Chirp updated!');
}

public function destroy(Work $work)
{
    $work->delete();
    return redirect()->back()->with('success', 'تم حذف العمل بنجاح!');
}
}
