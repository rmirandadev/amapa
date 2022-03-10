<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocalRequest;
use App\Models\Local;
use App\Models\Plataform;

class LocalController extends Controller
{

    public function index()
    {
        return view('admin.local.index');
    }

    public function create()
    {
        $plataforms = Plataform::orderBy('name')->pluck('name','id');
        return view('admin.local.create',compact('plataforms'));
    }

    public function store(LocalRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $data['name_size'] = $request->name . ' - ' . '['.$request->width.' x '.$request->height.']';
        Local::create($data);
        return redirect()->route('local.index')->withToastSuccess('Local adicionado!');
    }

    public function edit($id)
    {
        $local = Local::findOrFail($id);
        $plataforms = Plataform::orderBy('name')->pluck('name','id');
        return view('admin.local.edit',compact('local','plataforms'));
    }

    public function update(LocalRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        $data['name_size'] = $request->name . ' - ' . '['.$request->width.' x '.$request->height.']';
        Local::findOrFail($id)->update($data);
        return redirect()->route('local.index')->withToastSuccess('Local atualizado!');
    }


    public function destroy($id)
    {
        Local::findOrFail($id)->delete();
        return redirect()->back()->withToastSuccess('Local deletado!');
    }
}
