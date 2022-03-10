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
                            <li class="breadcrumb-item"><a href="{{ route('agency.event-index') }}">Eventos e Pautas</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $event->name }}</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-md-12 my-3">
                    <h2><strong><i class="las la-battery-three-quarters"></i> {{ $event->name }}</strong></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-calendar-alt"></i> Início
                                </div>
                                <div class="card-body">
                                    <span class="badge bg-success">
                                        {{ date('d',strtotime($event->initial_date)) . ' ' . GetMonth(date('m',strtotime($event->initial_date))) . ' ' . date('Y',strtotime($event->initial_date))  }}
                                    </span>
                                    <span class="badge bg-secondary">
                                        {{ date('H:i',strtotime($event->initial_hour)) }} hs
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fas fa-calendar-alt"></i> Fim
                                </div>
                                <div class="card-body">
                                    @isset($event->final_date)
                                        <span class="badge bg-success">
                                        {{ date('d',strtotime($event->final_date)) . ' ' . GetMonth(date('m',strtotime($event->final_date))) . ' ' . date('Y',strtotime($event->final_date))  }}
                                        </span>
                                        <span class="badge bg-secondary">
                                        {{ date('H:i',strtotime($event->final_hour)) }} hs
                                        </span>
                                    @else
                                        <span class="badge bg-warning">
                                        Não informado
                                        </span>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>

                   {!! $event->text !!}

                    <hr/>

                    <div class="small text-muted">
                        <p><i class="fas fa-user-circle"></i> Contato: {{ $event->contact }}</p>
                        <p><i class="fas fa-map-marker-alt"></i> Local: {{ $event->local }}</p>
                    </div>
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
    <script>
        $(document).ready(function () {
            //Fake Img
            $('#imageView img').replaceWith(function (i, v) {
                return $('<div/>', {
                    style: 'background-image: url(' + this.src + ');' +
                        'width:' + this.width + 'px;' +
                        'height:' + this.height + 'px;',
                    class: 'fakeImg'
                })
            })

        });
    </script>
@endpush

