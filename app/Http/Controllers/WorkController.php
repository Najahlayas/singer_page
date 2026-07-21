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


        public function edit (int $id)
{
    $work = Work::findOrFail($id);
    return response()->json($work);}

    public function update(Request $request, int $id)
{
        $work = Work::findOrFail($id);
        $data = $request->only(['album_title', 'song_title', 'album_art', 'song_image', 'audio_url']);
        $work->update($data);
        return redirect()->back()->with('success', 'تم تحديث العمل بنجاح!');
}

public function destroy(Work $work)
{
    $work->delete();
    return redirect()->back()->with('success', 'تم حذف العمل بنجاح!');
}
}
