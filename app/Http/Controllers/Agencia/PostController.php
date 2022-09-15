<?php

namespace App\Http\Controllers\Agencia;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Category;
use App\Models\Post;
use App\Models\Subcategory;

class PostController extends Controller
{
    public function index()
    {
        return view('agency.post.index');
    }

    public function category($slug)
    {
        $category = Category::whereSlug($slug)->first();
        $idCategory = $category->id;
        return view('agency.post.category',compact('category','idCategory'));
    }

    public function subcategory($slug_category,$slug_subcategory)
    {
        $category = Category::whereSlug($slug_category)->first();
        $idCategory = $category->id;
        $subcategory = Subcategory::whereSlug($slug_subcategory)->first();
        $idSubcategory = $subcategory->id;
        return view('agency.post.subcategory',compact('category','idCategory','subcategory','idSubcategory'));
    }

    public function show($slug)
    {
        $post = Post::whereSlug($slug)->first();
        if(!$post->finished)
            abort(404,'Notícia não encontrada');

        $post->increment('clicks');
        $outPosts = Post::with('category')->where('category_id',$post->category_id)->inRandomOrder()->limit(8)->get();
        return view('agency.post.show',compact('post','outPosts'));
    }
}
