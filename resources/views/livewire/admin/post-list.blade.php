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
            <th class="text-center">Publicação</th>
            <th>Título</th>
            <th class="text-center">Status</th>
            <th class="text-center">Finalização</th>
            <th class="text-center w-25">Ação</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td class="text-center">{{ date('d/m/y',strtotime($post->publication_date)) }}</td>
                <td>{{ $post->title }}</td>
                <td class="text-center">{!! $post->status_view !!}</td>
                <td class="text-center">{!! $post->finished_view !!}</td>
                <td class="text-center">

                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a href="{{ route('user.show',$post->user->id) }}" data-toggle="popover" title="{{ $post->user->name }}" data-content="<i class='fas fa-calendar-alt'></i> Em: {{date('d/m/Y',strtotime($post->updated_at))}} às {{date('H:i',strtotime($post->updated_at))}}h" class="btn btn-dark btn-xs"><i class="fas fa-user"></i></a>
                        <div class="btn-group" role="group">
                            <a class="btn btn-xs btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-tools mr-1"></i> Ações
                            </a>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="{{ route('post.show',$post->id) }}"><i class="fas fa-eye"></i> Detalhes</a>
                                @if(auth()->user()->hasRole('Assessor') && $post->user_finished_id != null)
                                    <a class="dropdown-item disabled" href="{{ route('post.edit',$post->id) }}"><i class="fas fa-edit"></i> Editar</a>
                                @else
                                    <a class="dropdown-item" href="{{ route('post.edit',$post->id) }}"><i class="fas fa-edit"></i> Editar</a>
                                @endif
                                @role('Administrador|Editor')
                                <div class="dropdown-divider"></div>
                                {!! Form::model($post, ['method' => 'delete', 'route' => ['post.destroy', $post->id], 'class' =>'form-delete']) !!}
                                <a class="dropdown-item text-danger delete" type="submit"><i class="fas fa-trash-alt"></i> Deletar</a>
                                {!! Form::close() !!}
                                @else
                                <a class="dropdown-item text-danger delete disabled" type="submit"><i class="fas fa-trash-alt"></i> Deletar</a>
                                @endrole
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Sem Resultados</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $posts->links() }}
</div>

