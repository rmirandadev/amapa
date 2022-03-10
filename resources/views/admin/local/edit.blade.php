@extends('adminlte::page')

@section('title', env('APP_NAME') . ' - Locais de anúncio')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-bullhorn"></i> Locais de anúncio</h5>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {!! Form::model($local, array('method' => 'PUT','route' => ['local.update', $local->id])) !!}
                <div class="card-header bg-info">Atualizar local</div>
                <div class="card-body">
                    @include('admin.local._form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{route('local.index')}}" class="btn btn-warning text-white"> <i class="fas fa-list"></i> Listagem</a>
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
    <script>
        $(document).ready(function() {
            $('.select2').select2({ width: '100%' });
        });
    </script>
@stop
