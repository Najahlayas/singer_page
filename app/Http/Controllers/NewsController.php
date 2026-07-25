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
            $news = NewsArticle::latest()->paginate(10);
        return view('pages.news', compact('news'));
        // return view('pages.news');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('pages.textEditingPage', ['post' => null]);
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
        $data['image'] = null;
    }

    // 3. Save to Database
    NewsArticle::create($data);

    return redirect()->route('news.index')->with('success', 'تم اضافة الخبر بنجاح!');
}

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $post = NewsArticle::findOrFail($id);
        return view('pages.newsViewPage', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit (int $id)
{
    $post = NewsArticle::findOrFail($id);
    // return response()->json($news);
    return view('pages.textEditingPage', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
{
        $news = NewsArticle::findOrFail($id);
        $data = $request->only(['image', 'title', 'body']);
        $news->update($data);
        return redirect()->route('news.index')->with('success', 'تم تحديث الخبر بنجاح!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsArticle $news)
{
    $news->delete();
    return redirect()->route('news.index')->with('success', 'تم حذف الخبر بنجاح!');
}
}
