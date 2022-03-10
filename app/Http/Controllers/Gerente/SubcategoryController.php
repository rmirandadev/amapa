<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{

    public function index()
    {
        return view('admin.subcategory.index');
    }

    public function create()
    {
        $categories = Category::orderBy('name')->pluck('name','id');
        return view('admin.subcategory.create',compact('categories'));
    }

    public function store(SubcategoryRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $data['slug'] = Str::slug($request->name);
        Subcategory::create($data);
        return redirect()->route('subcategory.index')->withToastSuccess('Subcategoria adicionada!');
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::orderBy('name')->pluck('name','id');
        return view('admin.subcategory.edit',compact('subcategory','categories'));
    }

    public function update(SubcategoryRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $data['slug'] = Str::slug($request->name);
        Subcategory::findOrFail($id)->update($data);
        return redirect()->route('subcategory.index')->withToastSuccess('Subcategoria atualizada!');
    }


    public function destroy($id)
    {
        Subcategory::findOrFail($id)->delete();
        return redirect()->back()->withToastSuccess('Subcategoria deletada!');
    }
}
