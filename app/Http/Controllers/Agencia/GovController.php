<?php

namespace App\Http\Controllers\Agencia;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Category;
use App\Models\Post;
use App\Models\Structure;
use App\Models\Subcategory;

class GovController extends Controller
{
    public function index()
    {
        return view('agency.gov.index');
    }

    public function show($slug)
    {
        $gov = Structure::whereSlug($slug)->first();
        return view('agency.gov.show',compact('gov'));
    }
}
