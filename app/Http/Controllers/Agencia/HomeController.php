<?php

namespace App\Http\Controllers\Agencia;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Event;
use App\Models\Post;
use App\Models\Tourism;
use App\Models\Video;

class HomeController extends Controller
{

    public function index()
    {
        $banners = Banner::orderBy('id','DESC')->limit(5)->get();
        $tourisms = Tourism::orderBy('name')->get();
        $events = Event::where('initial_date','>=',date('Y-m-d'))->limit(5)->get();
        $highlights = Post::whereHighlight('1')->orderBy('publication_date')->limit(9)->get();
        $morePost = Post::with('category')->more()->orderBy('clicks','DESC')->limit(8)->get();
        $lastPosts = Post::orderBy('id','DESC')->limit(8)->get();
        $video = Video::orderBy('id','DESC')->first();
        return view('agency.home.index',compact('banners','tourisms','events','highlights','morePost','video','lastPosts'));
    }
}
