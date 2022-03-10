@extends('adminlte::page')

@section('title', env('APP_NAME') . ' - Eventos')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-calendar-week"></i> Eventos</h5>
@stop

@section('content')
    <div class="card card-warning card-outline">
        <div class="card-header">
            <h3 class="card-title mt-2">Detalhes do evento</h3>
            <div class="card-tools">
                <a href="{{route('event.index')}}" class="btn btn-warning btn-sm text-white"> <i class="fas fa-list"></i> Listagem</a>
                <a href="{{route('event.edit',$event->id)}}" class="btn btn-info btn-sm text-white"> <i class="fas fa-edit"></i> Editar</a>
            </div>
        </div>
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center mb-3">
                                        <i class="fas fa-calendar-week fa-4x"></i>
                                    </div>

                                    <h3 class="profile-eventname text-center">{{ $event->name }}</h3>
                                    <p class="text-muted text-center">Local: {{ $event->local }}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Situação</b> <span class="float-right">{!! $event->StatusView !!}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Início do evento</b>
                                            <span class="float-right">
                                                 @if($event->initial_date)
                                                    <i class="fas fa-calendar-alt"></i> {{ date('d/m/Y',strtotime($event->initial_date)) }}
                                                @else
                                                    <span class="badge badge-danger">x</span>
                                                @endif
                                                -
                                                @if($event->initial_hour)
                                                    <i class="far fa-clock"></i> {{ date('H:i',strtotime($event->initial_hour)) }}h
                                                @else
                                                    <span class="badge badge-danger">x</span>
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Fim do evento</b>
                                            <span class="float-right">
                                                 @if($event->final_date)
                                                    <i class="fas fa-calendar-alt"></i> {{ date('d/m/Y',strtotime($event->final_date)) }}
                                                @else
                                                    <span class="badge badge-danger">x</span>
                                                @endif
                                                -
                                                @if($event->final_hour)
                                                    <i class="far fa-clock"></i> {{ date('H:i',strtotime($event->final_hour)) }}h
                                                @else
                                                    <span class="badge badge-danger">x</span>
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Contato</b> <span class="float-right">{{ $event->contact }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-success card-outline">
                                    <h3 class="card-title"><i class="fas fa-event"></i> Descrição</h3>
                                </div>
                                <div class="card-body">
                                    {!! $event->text !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


@stop

@push('css')

@endpush

@push('js')

@endpush
