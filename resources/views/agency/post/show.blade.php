@extends('agency.master')

@push('meta')

@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
@endpush

@section('main')
    <main>
        @include('agency.modals.video-modal')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('agency.index') }}">Início</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('agency.post-index') }}">Todas as notícias</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('agency.post-category',$post->category->slug) }}">{{ $post->category->name }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('agency.post-subcategory',[$post->category->slug,$post->subcategory->slug]) }}">{{ $post->subcategory->name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-12">
                    <span class="badge" style="background-color: {{ $post->category->color }}; border-color: {{ $post->category->color }} ">{{ $post->category->name }} / {{ $post->subcategory->name }}</span>
                </div>

                <div class="col-md-12 my-3">
                    @if($post->topic)<span class="badge bg-secondary">{{ $post->topic->name }}</span>@endif
                    <h2><strong><i class="las la-battery-three-quarters"></i> {{ $post->title }}</strong></h2>
                    <p>{{ $post->subtitle }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="small text-muted"><i class="fas fa-user"></i> {{ $post->user->name }}</div>
                    <div class="small text-muted"><i class="fas fa-calendar-alt"></i> Publicada: {{ $post->date_view }} - <i class="fa fa-eye"></i> {{ $post->clicks }} </div>
                    @if($post->image)
                        <img src="{{URL::asset('storage/posts/'.$post->image) }}" width="100%" class="img-fluid img-thumbnail mt-3 mb-5" alt="">
                        @if($post->image_legend)
                            <div class="small bg-blue-secondary text-white p-2">{{ $post->image_legend }}</div>
                        @endif
                    @endif
                    <p>
                        {!! $post->text !!}
                    </p>
                </div>
                <div class="col-md-4">
                    <div class="titles text-blue-secondary">Últimas Notícias</div>

                    <x-last-notice-component/>

                    <div class="text-end">
                        <a href="{{ route('agency.post-index') }}" class="btn btn-outline-blue-primary btn-sm">Ler todas</a>
                    </div>
                </div>
            </div>

            <!-- PUBLICIDADE INICIO -->
            <div class="row">
                @if($banners_two)
                    <div class="col-md-12 py-2 py-md-5">
                        <img src="{{URL::asset('storage/ads/'.$banners_two->image) }}" class="img-fluid" alt="">
                    </div>
                @endif
            </div>
            <!-- PUBLICIDADE FIM -->

            <!-- INICIO MAIS LIDAS -->
            <div class="row">
                <div class="col-md-12">
                    <div class="titles text-blue-secondary">Notícias relacionadas</div>
                </div>
            </div>
            <div class="row">
                <div class="more_views" id="imageView">
                    <div class="owl-old owl-carousel owl-theme">
                        @foreach($outPosts as $post)
                            <div class="item">
                                <a href="{{ route('agency.post-show',$post->slug) }}">
                                    <div class="card">
                                        <div class="card-header text-white px-2 py-1 small" style="background-color: {{ $post->category->color }}; border-color: {{ $post->category->color }}">{{ $post->category->name }}</div>
                                        @isset($post->image)
                                            <img src="{{URL::asset('storage/posts/'.$post->image) }}" width="100%" height="150" class="fakeImg mb-3" alt="">
                                        @else
                                            <img src="{{URL::asset('images/no-post.jpg') }}" width="100%" height="150" class="fakeImg mb-3" alt="">
                                        @endisset
                                        <div class="card-body p-0">
                                            <div class="small text-muted"><i class="fas fa-calendar-alt"></i> {{ $post->date_view }} - <i class="fas fa-eye"></i> {{ $post->clicks }}</div>
                                            <h6>{{ LimitChar(strip_tags($post->subtitle),85) }}</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 my-5 text-center">
                    <a href="{{ route('agency.post-category',$post->category->slug) }}" class="btn btn-outline-blue-primary">Ler todas relacionadas</a>
                </div>
            </div>
            <!-- FIM MAIS LIDAS -->
        </div>
    </main>
@endsection

@push('js')
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function(){

            $('.owl-old').owlCarousel({
                loop:true,
                margin:20,
                autoplay: true,
                autoplayHoverPause: true,
                responsive:{0:{items:2}, 600:{items:2}, 1000:{items:4}}
            })

            //Fake Img
            $('#imageView img').replaceWith(function(i, v){
                return $('<div/>', {
                    style: 'background-image: url(' + this.src + ');' +
                        'width:' + this.width + 'px;' +
                        'height:' + this.height + 'px;' ,
                    class: 'fakeImg'
                })
            })

        });
    </script>
@endpush

