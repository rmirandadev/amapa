@extends('agency.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
@endpush

@section('main')
    <main>
        @include('agency.modals.video-modal')
        <div class="container">
            <!-- INICIO PRIMEIRA LINHA -->
            <div class="row mb-5">
                <!--INICIO SLIDE-->
                <div class="col-md-8">
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">
                            @foreach($banners as $i => $banner)
                                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                    @if($banner->link)
                                        <a href="{{ $banner->link }}">
                                            <img src="{{URL::asset('storage/banners/'.$banner->image) }}" class="d-block w-100" alt="...">
                                            <div class="carousel-caption d-none d-md-block text-start ps-3">
                                                <h5>{{ $banner->title }}</h5>
                                                <p>{{ $banner->subtitle }}</p>
                                            </div>
                                        </a>
                                    @else
                                        <img src="{{URL::asset('storage/banners/'.$banner->image) }}" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block text-start ps-3">
                                            <h5>{{ $banner->title }}</h5>
                                            <p>{{ $banner->subtitle }}</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <!--FIM SLIDE-->
                <!--INICIO EVENTOS-->
                <div class="col-md-4 event">
                    <h5 class="text-center mt-2 w-75 mx-auto"><strong class="event-top">Pautas e Eventos</strong></h5>
                    <div class="card border-0">

                        <div class="card-body p-0">
                            <div class="owl-events owl-carousel owl-theme">
                                @forelse($events as $event)
                                    <div class="item">
                                        <table class="table m-0">
                                            <tbody>
                                            <tr>
                                                <td class="event-date py-4">
                                                    <h3 class="font-italic">{{ date('d',strtotime($event->initial_date)) }} {{ GetMonth(date('m',strtotime($event->initial_date))) }}</h3>
                                                    <h6 class="font-italic">{{ date('Y',strtotime($event->initial_date)) }}</h6>
                                                </td>
                                                <td class="event-description py-4">
                                                    {{ $event->name }}<br/>
                                                    <a href="{{ route('agency.event-show',$event->slug) }}" class="btn btn-blue-primary text-white btn-sm mt-2">Leia mais</a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @empty
                                    <div class="item">
                                        <table class="table m-0">
                                            <tbody>
                                            <tr>
                                                <td colspan="2" class="event-description py-4 text-center">
                                                    <i class="fas fa-calendar-alt d-block fa-3x mb-3"></i>
                                                    <h5>Sem eventos próximos</h5>
                                                    <h6>Veja a lista de eventos passados no link abaixo</h6>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-2 w-75 mx-auto"><strong class="event-bottom"><a href="{{ route('agency.event-index') }}" class="text-white">+ ver todas</a></strong></div>
                </div>
                <!--FIM EVENTOS-->
            </div>
            <!-- FIM PRIMEIRA LINHA -->

            <!-- INICIO SEGUNDA LINHA -->
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="titles text-blue-secondary">Notícias Destaque</div>
                        </div>
                        @foreach($highlights as $highlight)
                            <div class="col-6 col-md-4 notices">
                                <a href="{{ route('agency.post-show',$highlight->slug) }}" data-toggle="tooltip" title="{{ $highlight->subtitle }}">
                                    <div class="card" style="border-left: 5px solid {{ $highlight->category->color }}">
                                        <div class="card-body">
                                            <div class="small text-muted"><i class="fas fa-calendar-alt mb-2"></i> {{ $highlight->date_view }} </div>
                                            {{ LimitChar(strip_tags($highlight->title),80) }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                        <div class="col-md-12">
                            <a href="{{ route('agency.post-index') }}" class="btn btn-outline-blue-primary btn-sm my-3"><i class="fas fa-plus"></i> Todas as notícias</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="titles text-blue-secondary">Vídeos</div>
                    <div class="links">
                        <a href="#" data-bs-toggle="modal" class="video-btn" data-src="https://www.youtube.com/embed/{{ $video->cod }}" data-bs-target="#myVideo">
                            <img src="https://i.ytimg.com/vi/{{ $video->cod }}/mqdefault.jpg" width="100%" height="200" class="fakeImg" alt="">
                            <h6><strong>{{ $video->name }}</strong></h6>
                            <div class="small text-muted">{{ $video->text }}</div>
                        </a>
                    </div>
                    <div class="text-end">
                        <a href="{{ route('agency.video-index') }}" class="btn btn-outline-blue-primary btn-sm mt-3"><i class="fas fa-plus"></i> Outros vídeos</a>
                    </div>
                </div>
            </div>
            <!-- FIM SEGUNDA LINHA -->

            <!-- PUBLICIDADE INICIO -->

            <div class="row">
                @if($banners_one)
                    <div class="col-md-12 py-2 py-md-5">
                        <img src="{{URL::asset('storage/ads/'.$banners_one->image) }}" class="img-fluid" alt="">
                    </div>
                @endif
            </div>

            <!-- PUBLICIDADE FIM -->

            <!-- INICIO ULTIMAS NOTÍCIAS -->
            <div class="row">
                <div class="col-md-12">
                    <div class="titles text-blue-secondary">Últimas Notícias</div>
                </div>
            </div>
            <div class="row">
                @foreach($lastPosts as $last)
                    <div class="col-6 col-md-3 last_notices" id="imageView">
                        <a href="{{ route('agency.post-show',$last->slug) }}">
                            <div class="card mb-3">
                                <div class="card-header text-white p-1 small" style="background-color: {{ $last->category->color }}; border-radius: 0 0 30px 0; border-color: {{ $last->category->color }}">{{ $last->category->name }}</div>
                                <div class="card-body">
                                    @isset($last->image)
                                        <img src="{{URL::asset('storage/posts/'.$last->image) }}" width="100%" height="150" class="fakeImg mb-3" alt="">
                                    @else
                                        <img src="{{URL::asset('images/no-post.jpg') }}" width="100%" height="150" class="fakeImg mb-3" alt="">
                                    @endisset
                                    <p>{{ LimitChar(strip_tags($last->subtitle),85) }}</p>
                                    <div class="small text-muted"><i class="fas fa-calendar-alt"></i> {{ $last->date_view }} </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row my-3">
                <div class="col-md-12">
                    <div class="text-right">
                        <a href="{{ route('agency.post-index') }}" class="btn btn-outline-blue-primary btn-sm mt-3"><i class="fas fa-plus"></i> Todas as notícias</a>
                    </div>
                </div>
            </div>
            <!-- FIM ULTIMAS NOTÍCIAS -->

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
            @if(!$morePost->isEmpty())
                <div class="row">
                    <div class="col-md-12">
                        <div class="titles text-blue-secondary">Mais lidas do mês</div>
                    </div>
                </div>
                <div class="row">
                    <div class="more_views" id="imageView">
                        <div class="owl-old owl-carousel owl-theme">
                            @foreach($morePost as $more)
                                <div class="item">
                                    <a href="{{ route('agency.post-show',$more->slug) }}">
                                        <div class="card">
                                            <div class="card-header text-white px-2 py-1 small" style="background-color: {{ $more->category->color }}; border-color: {{ $more->category->color }}">{{ $more->category->name }}</div>
                                            @isset($more->image)
                                                <img src="{{URL::asset('storage/posts/'.$more->image) }}" width="100%" height="150" class="fakeImg mb-3" alt="">
                                            @else
                                                <img src="{{URL::asset('images/no-post.jpg') }}" width="100%" height="150" class="fakeImg mb-3" alt="">
                                            @endisset
                                            <div class="card-body p-0">
                                                <div class="small text-muted"><i class="fas fa-calendar-alt"></i> {{ $more->date_view }} - <i class="fas fa-eye"></i> {{ $more->clicks }}</div>
                                                <h6>{{ LimitChar(strip_tags($more->subtitle),85) }}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- FIM MAIS LIDAS -->
            @endif
            <!-- INICIO CONHEÇA O AMAPÁ -->
            <div class="row my-5">
                <div class="col-md-12">
                    <div class="titles text-green-primary"><i class="fas fa-map-signs"></i> Conheça o Amapá</div>
                </div>
                <div class="col-md-12">
                    <img src="{{ asset('images/conheca_amapa.jpeg') }}" class="w-100" alt="Conheça o Amapá">
                </div>
                <div class="col-md-12 conheca_amapa">
                    <div class="owl-amapa owl-carousel owl-theme">
                        @foreach($tourisms as $tourism)
                            <div class="item mt-3">
                                <a href="{{ route('agency.tourism-show',$tourism->slug) }}">
                                    <div class="card">
                                        <div class="card-header text-white p-1 bg-green-primary text-center">{{ $tourism->name }}</div>
                                        <img src="{{ URL::asset('storage/tourisms/'.$tourism->image) }}" class="img-fluid" alt="...">
                                        <div class="card-body">
                                            {!! LimitChar(strip_tags($tourism->text),120) !!}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- FIM CONHEÇA O AMAPÁ -->
        </div>
    </main>
@endsection

@push('js')
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            //EVENTS
            $('.owl-events').owlCarousel({
                loop:true,
                margin:10,
                center: true,
                autoplay: true,
                autoplayHoverPause: true,
                responsive:{0:{items:1}, 600:{items:1}, 1000:{items:1}}
            })

            $('.owl-old').owlCarousel({
                loop:true,
                margin:20,
                autoplay: true,
                autoplayHoverPause: true,
                responsive:{0:{items:2}, 600:{items:2}, 1000:{items:4}}
            })

            $('.owl-amapa').owlCarousel({
                loop:true,
                margin:10,
                autoplay: true,
                autoplayHoverPause: true,
                responsive:{0:{items:2}, 600:{items:2}, 1000:{items:4}}
            })

            // TOOLTIP
            $('[data-toggle="tooltip"]').tooltip({
                placement: "top",
                html: true,
            });

            //VIDEOS
            var $videoSrc;
            $('.video-btn').click(function() {
                $videoSrc = $(this).data( "src" );
            });

            $('#myVideo').on('shown.bs.modal', function (e) {

                $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" );
            });

            $('#myVideo').on('hide.bs.modal', function (e) {
                $("#video").attr('src',$videoSrc);
            });

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

