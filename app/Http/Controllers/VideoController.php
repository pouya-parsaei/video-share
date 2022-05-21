<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    public function create()
    {
        $categories = Category::select(['id', 'name'])->get();
        return view('videos.create', compact('categories'));
    }

    public function store(StoreVideoRequest $request)
    {
        $path = Storage::putFile('videos', $request->file);
        $request->merge([
            'path' => $path
        ]);

        $request->user()->videos()->create($request->all());

        return redirect()->route('index')->with('success', __('messages.success'));
    }

    public function show(Video $video)
    {
        $video->load('comments.user');
        return view('videos.show', compact('video'));
    }

    public function edit(Video $video)
    {
        $categories = Category::select(['id', 'name'])->get();

        return view('videos.edit', compact('video', 'categories'));
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        if ($request->hasFile('file')) {
            $path = Storage::putFile('videos', $request->file);
            $request->merge([
                'path' => $path
            ]);
        }
        $video->update($request->all());

        return redirect()->route('videos.show', $video->slug);
    }

}
