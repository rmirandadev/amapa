<?php

namespace App\Http\Controllers\Gerente;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        $roles = Role::pluck('name','name');
        return view('admin.user.create',compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['user_id'] = \Auth::user()->id;
        $user = User::create($data);
        $user->syncRoles($request->roles);

        return redirect()->route('user.index')->withToastSuccess('Usuário adicionado!');
    }


    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));
    }


    public function edit(User $user)
    {
        $roles = Role::pluck('name','name');
        $role = $user->roles->pluck('name','name');
        return view('admin.user.edit',compact('user','roles','role'));
    }


    public function update(UserRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = \Auth::user()->id;
        if(empty($data['password'])){
            unset($data['password']);
        }else{
            $data['password'] = Hash::make($request->password);
        }
        $user = User::findOrFail($id);
        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect()->route('user.index')->withToastSuccess('Usuário atualizado!');
    }


    public function destroy($id)
    {
        if(\Auth::user()->id == $id)
            return redirect()->route('user.index')->withToastError('Você não pode deletar sua própria conta!');

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->withToastSuccess('Usuário deletado!');
    }
}
