<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;

class NewsController extends Controller
{
     public function index()
    {
        $news = News::latest()->paginate(9);
        return view('news.view', compact('news'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('news.add');
    }

    /**
     * Store new news.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news_images', 'public');
        }

        News::create([
            'title'   => $request->title,
            'content' => $request->getContent(),
            'image'   => $path,
        ]);

        return redirect()->route('news.index')->with('success', 'News added successfully!');
    }

    /**
     * Show edit form.
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update news.
     */
//     public function update(Request $request, News $news)
//     {
//         $request->validate([
//             'title'   => 'required|max:255',
//             'content' => 'required',
//             'image'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
//         ]);

//         $path = $news->image;
//         if ($request->hasFile('image')) {
//             if ($news->image) {
//                 Storage::disk('public')->delete($news->image);
//             }
//             $path = $request->file('image')->store('news_images', 'public');
//         }

//         $news->update([
//             'title'   => $request->title,
//             'content' => $request->content,
//             'image'   => $path,
//         ]);

//         return redirect()->route('news.index')->with('success', 'News updated successfully!');
//     }

//     /**
//      * Delete news.
//      */
//     public function destroy(News $news)
//     {
//         if ($news->image) {
//             Storage::disk('public')->delete($news->image);
//         }
//         $news->delete();

//         return redirect()->route('news.index')->with('success', 'News deleted successfully!');
//     }
}
