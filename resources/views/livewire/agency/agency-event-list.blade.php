<div>
    <div class="titles text-blue-secondary">Todas os Eventos e Pautas</div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Procurar" wire:model.debounce.300ms="search">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <select wire:model="orderAsc" class="form-select mb-2">
                <option value="1">Decrescente</option>
                <option value="0">Crescente</option>
            </select>
        </div>

        <div class="col-md-4 mb-3">
            <select wire:model="open" class="form-select mb-2">
                <option value="1">Próximos eventos</option>
                <option value="0">Eventos passados</option>
            </select>
        </div>
    </div>

    <table class="table last_notices_show mb-5">
        <tbody>
        @forelse($events as $event)
            <tr>
                <td>
                    <a href="{{ route('agency.event-show',$event->slug) }}">
                        <h5><strong>{{ $event->name }}</strong></h5>
                        <span class="badge bg-success">
                            {{ date('d',strtotime($event->initial_date)) . ' ' . GetMonth(date('m',strtotime($event->initial_date))) . ' ' . date('Y',strtotime($event->initial_date))  }}
                        </span>
                        <span class="badge bg-secondary">
                            {{ date('H:i',strtotime($event->initial_hour)) }} hs
                        </span>
                        <div class="small text-muted mt-3">
                            <i class="fas fa-user-circle"></i> Contato: <br/>
                            {{ $event->contact }}<br/>
                            <i class="fas fa-map-marker-alt"></i> Local: <br/>
                            {{ $event->local }}<br/>
                        </div>
                    </a>
                </td>
            </tr>
        @empty
            <div class="alert alert-blue-secondary" role="alert">
                <i class="fas fa-exclamation-circle"></i> Sem eventos próximos
            </div>
        @endforelse
        </tbody>
    </table>
    {!! $events->links() !!}
</div>
