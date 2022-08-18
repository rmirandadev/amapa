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
            <th class="text-center">Início</th>
            <th class="text-center">Fim</th>
            <th class="text-center">Status</th>
            <th class="text-center w-25">Ação</th>
        </tr>
        </thead>
        <tbody>
        @forelse($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td class="text-center">
                    @if($event->initial_date)
                        {{ date('d/m/y',strtotime($event->initial_date)) }}
                    @else
                        <span class="badge badge-danger">x</span>
                    @endif
                    -
                    @if($event->initial_hour)
                       {{ date('H:i',strtotime($event->initial_hour)) }}h
                    @else
                        <span class="badge badge-danger">x</span>
                    @endif
                </td>
                <td class="text-center">
                    @if($event->final_date)
                       {{ date('d/m/y',strtotime($event->final_date)) }}
                    @else
                        <span class="badge badge-danger">x</span>
                    @endif
                    -
                    @if($event->final_hour)
                      {{ date('H:i',strtotime($event->final_hour)) }}h
                    @else
                        <span class="badge badge-danger">x</span>
                    @endif
                </td>
                <td class="text-center">{!! $event->StatusView !!}</td>
                <td class="text-center">

                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <a href="{{ route('user.show',$event->user->id) }}" data-toggle="popover" title="{{ $event->user->name }}" data-content="<i class='fas fa-calendar-alt'></i> Em: {{date('d/m/Y',strtotime($event->updated_at))}} às {{date('H:i',strtotime($event->updated_at))}}h" class="btn btn-dark btn-xs"><i class="fas fa-user"></i></a>
                        <div class="btn-group" role="group">
                            <a class="btn btn-xs btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-tools mr-1"></i> Ações
                            </a>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                <a class="dropdown-item" href="{{ route('event.show',$event->id) }}"><i class="fas fa-eye"></i> Visualizar</a>
                                <a class="dropdown-item" href="{{ route('event.edit',$event->id) }}"><i class="fas fa-edit"></i> Editar</a>
                                <div class="dropdown-divider"></div>
                                {!! Form::model($event, ['method' => 'delete', 'route' => ['event.destroy', $event->id], 'class' =>'form-delete']) !!}
                                <a class="dropdown-item text-danger" type="submit" class="delete"><i class="fas fa-trash-alt"></i> Deletar</a>
                                {!! Form::close() !!}
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
    {{ $events->links() }}
</div>

