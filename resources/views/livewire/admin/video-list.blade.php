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
            <th class="text-center">Código</th>
            <th class="text-center">Link</th>
            <th class="text-center">Status</th>
            <th class="text-center w-25">Ação</th>
        </tr>
        </thead>
        <tbody>
        @forelse($videos as $video)
            <tr>
                <td>{{ $video->name }}</td>
                <td class="text-center">{!! $video->cod !!}</td>
                <td class="text-center"><a href="https://www.youtube.com/watch?v={{$video->cod}}" target="_blank"><span class='badge badge-primary'><i class='fas fa-external-link-alt'></i> Link</span></a></td>
                <td class="text-center">{!! $video->StatusView !!}</td>
                <td class="text-center">
                    <a href="{{ route('video.edit',$video->id) }}" class="btn btn-info btn-xs"><i class="fas fa-edit"></i></a>
                    {!! Form::model($video, ['method' => 'delete', 'route' => ['video.destroy', $video->id], 'class' =>'form-delete', 'style' => 'display:inline']) !!}
                    <button type="submit" name="delete_modal" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Sem Resultados</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $videos->links() }}
</div>

