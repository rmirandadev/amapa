@extends('adminlte::page')

@section('title', env('APP_NAME') . ' -  Turismo')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-directions"></i> Turismo</h5>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {!! Form::open(['route' => 'tourism.store','files' => true]) !!}
                <div class="card-header bg-success">Adicionar turismo</div>
                <div class="card-body">
                    @include('admin.tourism._form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{route('tourism.index')}}" class="btn btn-warning text-white"> <i class="fas fa-list"></i> Listagem</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').addClass("selected").html(fileName);
        });

        CKEDITOR.replace('text');
    </script>
@stop
