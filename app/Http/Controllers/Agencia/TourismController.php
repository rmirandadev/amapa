<?php

namespace App\Http\Controllers\Agencia;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Post;
use App\Models\Tourism;

class TourismController extends Controller
{

    public function show($slug)
    {
        $banners_two = Ads::where('initial_date','<=', NOW())->where('final_date','>',NOW())->whereLocalId(2)->inRandomOrder()->first();
        $lastPosts = Post::orderBy('id','DESC')->limit(8)->get();
        $tourisms = Tourism::orderBy('name')->get();
        $tourism = Tourism::whereSlug($slug)->first();
        return view('agency.tourism.show',compact('banners_two','lastPosts','tourism','tourisms'));
    }
}
