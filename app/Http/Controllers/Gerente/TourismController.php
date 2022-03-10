<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourismRequest;
use App\Models\Tourism;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TourismController extends Controller
{
    public $folder = 'tourisms';

    public function index()
    {
        return view('admin.tourism.index');
    }

    public function create()
    {
        return view('admin.tourism.create');
    }

    public function store(TourismRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $data['slug'] = Str::slug($request->name);
        if($request->hasFile('image')) {
            $ext = Str::lower($request->file('image')->getClientOriginalExtension());
            $tourism_name = Str::slug($request->name) . '-' . date('dmysi') . '.' . $ext;
            $request->file('image')->storeAs($this->folder, $tourism_name);
            $data['image'] = $tourism_name;
        }

        Tourism::create($data);
        return redirect()->route('tourism.index')->withToastSuccess('Turismo adicionado!');
    }

    public function edit(Tourism $tourism)
    {
        return view('admin.tourism.edit',compact('tourism'));
    }

    public function update(TourismRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $data['slug'] = Str::slug($request->name);
        if($request->hasFile('image')) {
            $file = Tourism::findOrFail($id);
            Storage::delete('tourisms/' . $file->image);

            $ext = Str::lower($request->file('image')->getClientOriginalExtension());
            $tourism_name = Str::slug($request->name) . '-' . date('dmysi') . '.' . $ext;
            $request->file('image')->storeAs($this->folder, $tourism_name);
            $data = $request->all();
            $data['image'] = $tourism_name;
        }

        Tourism::findOrFail($id)->update($data);
        return redirect()->route('tourism.index')->withToastSuccess('Turismo atualizado!');
    }

    public function destroy($id)
    {
        $file = Tourism::findOrFail($id);
        $file->delete();
        Storage::delete('tourisms/'.$file->image);
        return redirect()->back()->withToastSuccess('Turismo deletado!');
    }
}
