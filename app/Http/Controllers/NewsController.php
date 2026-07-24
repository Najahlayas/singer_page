<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsArticle;
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
    // 1. Validate the data
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'body'  => 'required|string', // This is the Tiptap content
    ]);

    // 2. Handle the Image Upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        // Stores in storage/app/public/news
        $imagePath = $request->file('image')->store('news', 'public');
        $data['image'] = $imagePath;
    }
    else{
        $data['image'] = 'https://placehold.co/600x400?text=Place\nHolder';
    }

    // 3. Save to Database
    NewsArticle::create($data);

    return redirect()->route('news.index')->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $news = NewsArticle::all();
        return view('pages.news', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit (int $id)
{
    $news = NewsArticle::findOrFail($id);
    return response()->json($news);}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
{
        $news = NewsArticle::findOrFail($id);
        $data = $request->only(['image', 'title', 'body']);
        $news->update($data);
        return redirect()->back()->with('success', 'تم تحديث الخبر بنجاح!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsArticle $news)
{
    $news->delete();
    return redirect()->back()->with('success', 'تم حذف الخبر بنجاح!');
}





// {{-- album art, Song image, album title, song title, audio url --}}








}
