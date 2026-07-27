<?php

namespace App\Http\Controllers;

use App\Models\NewsArticle;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $news = NewsArticle::latest()->paginate(5);

        return view('pages.news', compact('news'));
    }


    public function create()
    {
        return view('pages.textEditingPage', [
            'post' => null
        ]);
    }


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



    public function show(int $id)
    {
        $post = NewsArticle::findOrFail($id);

        return view('pages.newsViewPage', compact('post'));
    }



    public function edit(int $id)
    {
        $post = NewsArticle::findOrFail($id);

        return view('pages.textEditingPage', compact('post'));
    }



    public function update(Request $request, int $id)
    {

        $news = NewsArticle::findOrFail($id);


        $data = $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'required|string',
            'body'  => 'required|string',
        ]);


        if ($request->hasFile('image')) {

            $data['image'] = $request->file('image')
                ->store('news', 'public');

        }


        $news->update($data);


        return redirect()
            ->route('news.index')
            ->with('success', 'تم تحديث الخبر بنجاح');
    }



    public function destroy(int $id)
    {

        $news = NewsArticle::findOrFail($id);

        $news->delete();


        return redirect()
            ->route('news.index')
            ->with('success', 'تم حذف الخبر بنجاح!');
    }
}
