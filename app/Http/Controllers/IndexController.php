<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
        $mostViewedVideos = Video::inRandomOrder()->with(['category','user'])->limit(6)->get();
        $mostPopularVideos = Video::inRandomOrder()->with(['category','user'])->limit(6)->get();

        return view('index',compact('mostViewedVideos','mostPopularVideos'));
    }
}
