<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
    $works = Work::paginate(5);


        return view('pages.works', compact('works'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'album_title' => 'required|string|max:255',
                'song_title'  => 'required|string|max:255',
                'album_art'   => 'required|url',
                'song_image'  => 'required|url',
                'audio_url'   => 'required|url',
            // ],
            // [
            //     'album_title.required' => 'حقل عنوان الألبوم مطلوب.',
            //     'song_title.required'  => 'حقل عنوان الأغنية مطلوب.',
            //     'album_art.required'   => 'حقل رابط صورة الألبوم مطلوب.',
            //     'song_image.required'  => 'حقل رابط صورة الأغنية مطلوب.',
            //     'audio_url.required'   => 'حقل رابط الأغنية مطلوب.',

            //     'album_art.url'  => 'يجب أن يكون رابط صورة الألبوم صالحًا.',
            //     'song_image.url' => 'يجب أن يكون رابط صورة الأغنية صالحًا.',
            //     'audio_url.url'  => 'يجب أن يكون رابط الأغنية صالحًا.',
            ]
        );

        Work::create($validated);

return redirect()
        ->route('works.index')
        ->with('success', 'تمت إضافة العمل بنجاح');
}
    public function edit(int $id)
    {
        $work = Work::findOrFail($id);

        return response()->json($work);
    }

    public function update(Request $request, int $id)
    {
        $work = Work::findOrFail($id);

        $validated = $request->validate(
            [
                'album_title' => 'required|string|max:255',
                'song_title'  => 'required|string|max:255',
                'album_art'   => 'required',
                'song_image'  => 'required',
                'audio_url'   => 'required',
            // ],
            // [
            //     'album_title.required' => 'حقل عنوان الألبوم مطلوب.',
            //     'song_title.required'  => 'حقل عنوان الأغنية مطلوب.',
            //     'album_art.required'   => 'حقل رابط صورة الألبوم مطلوب.',
            //     'song_image.required'  => 'حقل رابط صورة الأغنية مطلوب.',
            //     'audio_url.required'   => 'حقل رابط الأغنية مطلوب.',

            //     'album_art.url'  => 'يجب أن يكون رابط صورة الألبوم صالحًا.',
            //     'song_image.url' => 'يجب أن يكون رابط صورة الأغنية صالحًا.',
            //     'audio_url.url'  => 'يجب أن يكون رابط الأغنية صالحًا.',
            ]
        );

        $work->update($validated);

        return redirect()->back()->with('success', 'تم تحديث العمل بنجاح!');
    }

    public function destroy(Work $work)
    {
        $work->delete();

        return redirect()->back()->with('success', 'تم حذف العمل بنجاح!');
    }
}
