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
            $news = NewsArticle::latest()->paginate(5);
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
    $data = $request->validate([
        'title' => 'required|string',
        'body'  => 'required|string',
        'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);


    if ($request->hasFile('image')) {

        $data['image'] = $request->file('image')
            ->store('news', 'public');

    }


    NewsArticle::create($data);


    return redirect()
        ->route('news.index')
        ->with('success', 'تم إضافة الخبر بنجاح!');
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

    $data = $request->validate([
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'title' => 'required|string',
        'body'  => 'required|string',
    ]);

    $news->update($data);

    return redirect()
        ->route('news.index')
        ->with('success', 'تم تحديث الخبر بنجاح');
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
