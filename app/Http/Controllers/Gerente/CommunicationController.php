<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunicationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CommunicationController extends Controller
{
    public function verify($id)
    {
        if(Auth::user()->id != $id)
            return redirect()->route('communication.show',Auth::user()->id)->withToastError('Acesso negado!');
    }

    public function show($id)
    {
        $this->verify($id);
        $user = User::findOrFail($id);
        return view('admin.user.show',compact('user'));
    }

    public function edit($id)
    {

        $this->verify($id);
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','name');
        $role = $user->roles->pluck('name','name');

        return view('admin.user.edit',compact('user','role','roles'));
    }


    public function update(CommunicationRequest $request, $id)
    {
        $this->verify($id);
        $data = $request->all();
        if(empty($data['password'])){
            unset($data['password']);
        }else{
            $data['password'] = Hash::make($request->password);
        }
        $user = User::findOrFail($id);
        $user->update($data);

        if($user->hasRole('Administrador'))
        {
            return redirect()->route('user.index')->withToastSuccess('Usuário atualizado!');
        }
        return redirect()->route('communication.show',$id)->withToastSuccess('Usuário atualizado!');

    }
}
