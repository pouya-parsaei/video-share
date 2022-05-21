<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisLikeController extends Controller
{
    public function store(Request $request,string $likeableType, $likeableId)
    {
        if($likeableId->isDislikedBy(auth()->user())){
            $likeableId->notDislikedBy(auth()->user());
            return back();
        }

        $likeableId->dislikedBy(auth()->user());

        return back();
    }
}
