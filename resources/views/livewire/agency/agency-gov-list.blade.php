<div>
    <div class="titles text-blue-secondary">Estrutura de Governo</div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Procurar" wire:model.debounce.300ms="search">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>
    </div>

    <table class="table table-striped gov-list">
        <tbody>
        @forelse($govs as $gov)
            <tr>
                <td>
                    <a href="{{ route('agency.gov-show',$gov->slug) }}"><strong>{{ $gov->initials }}</strong> - {{ $gov->name }}</a>
                </td>
            </tr>
        @empty
            <div class="alert alert-blue-secondary" role="alert">
                <i class="fas fa-exclamation-circle"></i> Sem informações no momento
            </div>
        @endforelse
        </tbody>
    </table>
    {!! $govs->links() !!}
</div>
