<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request,string $likeableType, $likeableId)
    {
        if($likeableId->isLikedBy(auth()->user())){
            $likeableId->notLikedBy(auth()->user());
            return back();
        }

        $likeableId->likedBy(auth()->user());
        return back();
    }
}
