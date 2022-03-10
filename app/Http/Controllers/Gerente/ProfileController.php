<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{

    public function index()
    {
        return view('admin.profile.index');
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(ProfileRequest $request)
    {
        $data = $request->all();
        Role::create($data);
        return redirect()->route('profile.index')->withToastSuccess('Perfil adicionado!');
    }

    public function edit($id)
    {
        $role = Role::findById($id);
        return view('admin.profile.edit',compact('role'));
    }

    public function update(ProfileRequest $request, $id)
    {
        $data = $request->all();
        Role::findById($id)->update($data);
        return redirect()->route('profile.index')->withToastSuccess('Perfil atualizado!');
    }


    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return redirect()->back()->withToastSuccess('Perfil deletado!');
    }
}
