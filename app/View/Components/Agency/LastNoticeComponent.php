<?php

namespace App\View\Components\Agency;

use App\Models\Post;
use Illuminate\View\Component;

class LastNoticeComponent extends Component
{

    public function __construct()
    {

    }

    public function render()
    {
        $lastPosts = Post::orderBy('id','DESC')->limit(8)->get();
        return view('components.agency.last-notice-component',compact('lastPosts'));
    }
}
