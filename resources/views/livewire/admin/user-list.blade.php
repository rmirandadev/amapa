<div class="card-body">
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Procurar" wire:model.debounce.300ms="search">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <select wire:model="orderAsc" class="form-control mb-2">
                <option value="1">Crescente</option>
                <option value="0">Decrescente</option>
            </select>
        </div>

        <div class="col-auto ml-auto mb-2">
            Mostrar
            <select wire:model.lazy="pagina" id="por_pagina" class="custom-select w-auto">
                @for($i = 5;$i <= 25; $i += 5)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            por página
        </div>
    </div>

    <table class="table table-hover table-striped mb-3">
        <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Perfil</th>
            <th class="text-center">Status</th>
            <th class="text-center w-25">Ação</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @forelse ($user->roles as $role)
                        <span class="badge badge-primary">{{$role->name}}</span>
                    @empty
                        <span class="badge badge-warning">Sem perfil</span>
                    @endforelse
                </td>
                <td class="text-center" style="width: 20px">{!! $user->StatusView !!}</td>
                <td class="text-center">

                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a href="{{ route('user.show',$user->user->id) }}" data-toggle="popover" title="{{ $user->user->name }}" data-content="<i class='fas fa-calendar-alt'></i> Em: {{date('d/m/Y',strtotime($user->updated_at))}} às {{date('H:i',strtotime($user->updated_at))}}h" class="btn btn-dark btn-xs"><i class="fas fa-user"></i></a>
                        <div class="btn-group" role="group">
                            <a class="btn btn-xs btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-tools mr-1"></i> Ações
                            </a>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="{{ route('user.show',$user->id) }}"><i class="fas fa-eye"></i> Detalhes</a>
                                <a class="dropdown-item" href="{{ route('user.edit',$user->id) }}"><i class="fas fa-edit"></i> Editar</a>
                                @if(Auth::user()->id != $user->id)
                                    <div class="dropdown-divider"></div>
                                    {!! Form::model($user, ['method' => 'delete', 'route' => ['user.destroy', $user->id], 'class' =>'form-delete']) !!}
                                    <a class="dropdown-item text-danger" type="submit" class="delete"><i class="fas fa-trash-alt"></i> Deletar</a>
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Sem Resultados</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $users->links() }}
</div>

