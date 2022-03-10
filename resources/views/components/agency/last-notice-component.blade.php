<div>
    <table class="table table-borderless links">
        <tbody>
        @foreach($lastPosts as $last)
            <tr>
                <td class="w-25 px-0 py-2">
                    <a href="{{ route('agency.post-show',$last->slug) }}">
                        @isset($last->image)
                            <img src="{{URL::asset('storage/posts/'.$last->image) }}" width="130" height="90" class="fakeImg" alt="">
                        @else
                            <img src="{{URL::asset('images/no-post.jpg') }}" width="130" height="90" class="fakeImg" alt="">
                        @endisset
                    </a>
                </td>
                <td>
                    <a href="{{ route('agency.post-show',$last->slug) }}">
                        <span class="badge mb-1" style="background-color: {{ $last->category->color }}">{{ $last->category->name }}</span>
                        <div><strong>{{ LimitChar(strip_tags($last->subtitle),85) }}</strong></div>
                        <div class="small text-muted"><i class="fas fa-calendar-alt"></i> {{ $last->date_view }}</div>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
