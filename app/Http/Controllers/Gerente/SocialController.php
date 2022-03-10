<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialRequest;
use App\Models\Social;

class SocialController extends Controller
{

    public function index()
    {
        return view('admin.social.index');
    }

    public function create()
    {
        return view('admin.social.create');
    }

    public function store(SocialRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        Social::create($data);
        return redirect()->route('social.index')->withToastSuccess('Link adicionado!');
    }

    public function edit($id)
    {
        $social = Social::findOrFail($id);
        return view('admin.social.edit',compact('social'));
    }

    public function update(SocialRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        Social::findOrFail($id)->update($data);
        return redirect()->route('social.index')->withToastSuccess('Link atualizado!');
    }


    public function destroy($id)
    {
        Social::findOrFail($id)->delete();
        return redirect()->back()->withToastSuccess('Link deletado!');
    }
}
