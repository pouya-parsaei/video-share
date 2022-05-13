<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $mostViewedVideos = Video::inRandomOrder()->with('category')->limit(6)->get();
        $mostPopularVideos = Video::inRandomOrder()->with('category')->limit(6)->get();
        return view('index',compact('mostViewedVideos','mostPopularVideos'));
    }
}
