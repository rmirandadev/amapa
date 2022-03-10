<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $data['slug'] = Str::slug($request->name);
        Category::create($data);
        return redirect()->route('category.index')->withToastSuccess('Categoria adicionada!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $data['slug'] = Str::slug($request->name);
        Category::findOrFail($id)->update($data);
        return redirect()->route('category.index')->withToastSuccess('Categoria atualizada!');
    }


    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->withToastSuccess('Categoria deletada!');
    }
}
