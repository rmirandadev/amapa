<div>
    <div class="titles text-blue-secondary">Todas as notícias</div>
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

    <table class="table last_notices_show">
        <tbody class="">
        @forelse($posts as $last)
            <tr>
                <td class="w-25 px-0 py-2">
                    <a href="{{ route('agency.post-show',$last->slug) }}">
                        @isset($last->image)
                            <img src="{{URL::asset('storage/posts/'.$last->image) }}" width="200" height="130" class="fakeImg" alt="">
                        @else
                            <img src="{{URL::asset('images/no-post.jpg') }}" width="200" height="130" class="fakeImg" alt="">
                        @endisset
                    </a>
                </td>
                <td>
                    <a href="{{ route('agency.post-show',$last->slug) }}">
                        <span class="badge mb-1" style="background-color: {{ $last->category->color }}">{{ $last->category->name }}</span>
                        <div><strong>{{ $last->title }}</strong></div>
                        <div>{{ LimitChar($last->subtitle,120) }}</div>
                        <div class="small text-muted"><i class="fas fa-calendar-alt"></i> {{ $last->date_view }}</div>
                    </a>
                </td>
            </tr>
        @empty
            <div class="alert alert-blue-secondary" role="alert">
                <i class="fas fa-exclamation-circle"></i> Sem notícias no momento
            </div>
        @endforelse
        </tbody>
    </table>
    {!! $posts->links() !!}
</div>
