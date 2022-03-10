@extends('adminlte::page')

@section('title', env('APP_NAME') . ' - Eventos')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-calendar-week"></i> Eventos</h5>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {!! Form::model($event, array('method' => 'PUT','route' => ['event.update', $event->id])) !!}
                <div class="card-header bg-info">Atualizar Rede Social</div>
                <div class="card-body">
                    @include('admin.event._form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{route('event.index')}}" class="btn btn-warning text-white"> <i class="fas fa-list"></i> Listagem</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('plugins.Select2', true)

@section('js')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({ width: '100%' });
        });

        CKEDITOR.replace('text');
    </script>
@stop
