<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoCommentRequest;
use App\Models\Video;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreVideoCommentRequest $request, Video $video)
    {
        $video->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);

        return back()->with('success',__('messages.success'));
    }
}
