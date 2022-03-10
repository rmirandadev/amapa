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
                <td class="text-center">{{ date('d/m/Y',strtotime($post->publication_date)) }}</td>
                <td>{{ $post->title }}</td>
                <td class="text-center">{!! $post->status_view !!}</td>
                <td class="text-center">{!! $post->finished_view !!}</td>
                <td class="text-center">
                    <a href="{{ route('user.show',$post->user->id) }}" data-toggle="popover" title="{{ $post->user->name }}" data-content="<i class='fas fa-calendar-alt'></i> Em: {{date('d/m/Y',strtotime($post->updated_at))}} às {{date('H:i',strtotime($post->updated_at))}}h" class="btn btn-dark btn-xs"><i class="fas fa-user"></i></a>
                    <a href="{{ route('post.show',$post->id) }}" class="btn btn-warning btn-xs"><i class="fas fa-eye"></i></a>
                    @if(auth()->user()->hasRole('Assessor') && $post->user_finished_id != null)
                        <button class="btn btn-info btn-xs" disabled="disabled"><i class="fas fa-edit"></i></button>
                    @else
                        <a href="{{ route('post.edit',$post->id) }}" class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                    @endif
                    @role('Administrador|Editor')
                    {!! Form::model($post, ['method' => 'delete', 'route' => ['post.destroy', $post->id], 'class' =>'form-delete', 'style' => 'display:inline']) !!}
                    <button type="submit" name="delete_modal" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>
                    {!! Form::close() !!}
                    @else
                        <button class="btn btn-danger btn-xs delete" disabled><i class="fa fa-trash"></i></button>
                        @endrole
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

