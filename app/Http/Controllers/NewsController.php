<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $works = News::all();
        // return view('pages.news', compact('works'));
        return view('pages.news');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('pages.textEditingPage');
}

    /**
     * Store a newly created resource in storage.
     */
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

        News::create($validSong);
        return redirect()->back()->with('success', 'تم اضافة العمل بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $works = News::all();
        return view('pages.news', compact('works'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit (int $id)
{
    $news = News::findOrFail($id);
    return response()->json($news);}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
{
        $news = News::findOrFail($id);
        $data = $request->only(['album_title', 'song_title', 'album_art', 'song_image', 'audio_url']);
        $news->update($data);
        return redirect()->back()->with('success', 'تم تحديث العمل بنجاح!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
{
    $news->delete();
    return redirect()->back()->with('success', 'تم حذف العمل بنجاح!');
}





// {{-- album art, Song image, album title, song title, audio url --}}








}
