<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlataformRequest;
use App\Models\Plataform;

class PlataformController extends Controller
{

    public function index()
    {
        return view('admin.plataform.index');
    }

    public function create()
    {
        return view('admin.plataform.create');
    }

    public function store(PlataformRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        Plataform::create($data);
        return redirect()->route('plataform.index')->withToastSuccess('Plataforma adicionada!');
    }

    public function edit($id)
    {
        $plataform = Plataform::findOrFail($id);
        return view('admin.plataform.edit',compact('plataform'));
    }

    public function update(PlataformRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        Plataform::findOrFail($id)->update($data);
        return redirect()->route('plataform.index')->withToastSuccess('Plataforma atualizada!');
    }


    public function destroy($id)
    {
        Plataform::findOrFail($id)->delete();
        return redirect()->back()->withToastSuccess('Plataforma deletada!');
    }
}
