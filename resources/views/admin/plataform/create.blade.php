@extends('adminlte::page')

@section('title', env('APP_NAME') . ' - Plataformas')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-coins"></i> Plataformas</h5>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {!! Form::open(['route' => 'plataform.store']) !!}
                <div class="card-header bg-success">Criar plataforma</div>
                <div class="card-body">
                    @include('admin.plataform._form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{route('plataform.index')}}" class="btn btn-warning text-white"> <i class="fas fa-list"></i> Listagem</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('css')

@stop


@section('js')

@stop
