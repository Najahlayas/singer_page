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
                'album_art'   => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'song_image'  => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'audio_url'   => 'required|file|mimes:mp3,wav,aac,ogg,m4a,mpga|max:2048',
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
        $validated["album_art"] = $request->file('album_art')->store('album_arts','public');
        $validated["song_image"] = $request->file('song_image')->store('song_images','public');
        $validated["audio_url"] = $request->file('audio_url')->store('audio_files','public');
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
                'album_art'   => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'song_image'  => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'audio_url'   => 'required|file|mimes:mp3,wav,aac,ogg,m4a,mpga|max:2048',
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
        $validated["album_art"] = $request->file('album_art')->store('album_arts','public');
        $validated["song_image"] = $request->file('song_image')->store('song_images','public');
        $validated["audio_url"] = $request->file('audio_url')->store('audio_files','public');
        $work->update($validated);

        return redirect()->back()->with('success', 'تم تحديث العمل بنجاح!');
    }

    public function destroy(Work $work)
    {
        $work->delete();

        return redirect()->back()->with('success', 'تم حذف العمل بنجاح!');
    }
}
