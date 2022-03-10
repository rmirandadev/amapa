<div>
    <div class="titles text-blue-secondary">Todas os vídeos</div>
    <div class="row">
        <div class="col-md-9 mb-3">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Procurar" wire:model.debounce.300ms="search">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <select wire:model="orderAsc" class="form-select mb-2">
                <option value="1">Decrescente</option>
                <option value="0">Crescente</option>
            </select>
        </div>
    </div>

    <div class="row last_notices_show mb-5">
        @forelse($videos as $video)
            <div class="col-sm-4 mb-5" data-toggle="tooltip" title="{{ $video->name }}">
                <a href="#" data-bs-toggle="modal" class="video-btn" data-src="https://www.youtube.com/embed/{{ $video->cod }}" data-bs-target="#myVideo">
                    <img src="https://i.ytimg.com/vi/{{ $video->cod }}/mqdefault.jpg" width="100%" height="150" class="fakeImg" alt="">
                    <h6><strong>{{ $video->name }}</strong></h6>
                    <div class="small text-muted">{{ $video->text }}</div>
                </a>
            </div>
        @empty
            <div class="col-md-12">
                <div class="alert alert-blue-secondary" role="alert">
                    <i class="fas fa-exclamation-circle"></i> Sem vídeos no momento
                </div>
            </div>
        @endforelse
    </div>
    {!! $videos->links() !!}
</div>
