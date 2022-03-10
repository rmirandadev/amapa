@extends('agency.master')

@push('meta')

@endpush

@push('css')
    @livewireStyles
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
                            <li class="breadcrumb-item active">Todas os vídeos</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    @livewire('agency-video-list')
                </div>
                <div class="col-md-4 mb-5">
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
        </div>
    </main>
@endsection

@push('js')
    @livewireScripts
    <script>
        Livewire.onLoad(() => {
            //Fake Img
            $('#imageView img').replaceWith(function(i, v){
                return $('<div/>', {
                    style: 'background-image: url(' + this.src + ');' +
                        'width:' + this.width + 'px;' +
                        'height:' + this.height + 'px;' ,
                    class: 'fakeImg'
                })
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

        });
    </script>
@endpush

