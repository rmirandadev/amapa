<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\UtilityRequest;
use App\Models\Utility;

class UtilityController extends Controller
{

    public function index()
    {
        return view('admin.utility.index');
    }

    public function create()
    {
        return view('admin.utility.create');
    }

    public function store(UtilityRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        Utility::create($data);
        return redirect()->route('utility.index')->withToastSuccess('Utilitário adicionado!');
    }

    public function edit($id)
    {
        $utility = Utility::findOrFail($id);
        return view('admin.utility.edit',compact('utility'));
    }

    public function update(UtilityRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        Utility::findOrFail($id)->update($data);
        return redirect()->route('utility.index')->withToastSuccess('Utilitário atualizado!');
    }


    public function destroy($id)
    {
        Utility::findOrFail($id)->delete();
        return redirect()->back()->withToastSuccess('Utilitário deletado!');
    }
}
