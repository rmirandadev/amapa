<?php

namespace App\Http\Controllers\Agencia;

use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function index()
    {
        return view('agency.video.index');
    }
}
