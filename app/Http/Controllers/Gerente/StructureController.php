<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\StructureRequest;
use App\Models\Structure;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StructureController extends Controller
{
    public $folder = 'structures';

    public function index()
    {
        return view('admin.structure.index');
    }

    public function create()
    {
        return view('admin.structure.create');
    }

    public function store(StructureRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $data['slug'] = Str::slug($request->name);
        if($request->hasFile('image')) {
            $ext = Str::lower($request->file('image')->getClientOriginalExtension());
            $structure_name = Str::slug($request->name) . '-' . date('dmysi') . '.' . $ext;
            $request->file('image')->storeAs($this->folder, $structure_name);
            $data['image'] = $structure_name;
        }

        Structure::create($data);
        return redirect()->route('structure.index')->withToastSuccess('Estrutura adicionada!');
    }

    public function edit(Structure $structure)
    {
        return view('admin.structure.edit',compact('structure'));
    }

    public function update(StructureRequest $request, $id)
    {
        $data = $request->except('remove');
        if($request->remove){
            $file = Structure::findOrFail($id);
            Storage::delete('structures/' . $file->image);
            $data['image'] = null;
        }
        $data['user_id'] = \Auth::user()->id;
        $data['slug'] = Str::slug($request->name);
        if($request->hasFile('image')) {
            $file = Structure::findOrFail($id);
            Storage::delete('structures/' . $file->image);

            $ext = Str::lower($request->file('image')->getClientOriginalExtension());
            $structure_name = Str::slug($request->name) . '-' . date('dmysi') . '.' . $ext;
            $request->file('image')->storeAs($this->folder, $structure_name);
            $data = $request->all();
            $data['image'] = $structure_name;
        }

        Structure::findOrFail($id)->update($data);
        return redirect()->route('structure.index')->withToastSuccess('Estrutura atualizada!');
    }

    public function destroy($id)
    {
        $file = Structure::findOrFail($id);
        $file->delete();
        Storage::delete('structures/'.$file->image);
        return redirect()->back()->withToastSuccess('Estrutura deletada!');
    }
}
