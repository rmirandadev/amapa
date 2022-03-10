@extends('adminlte::page')

@section('title', env('APP_NAME') . ' -  Estrutura de Governo')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-boxes"></i> Estrutura de Governo</h5>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {!! Form::model($structure, array('method' => 'PUT','route' => ['structure.update', $structure->id],'files' => true)) !!}
                <div class="card-header bg-info">Atualizar estrutura</div>
                <div class="card-body">
                    @include('admin.structure._form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{route('structure.index')}}" class="btn btn-warning text-white"> <i class="fas fa-list"></i> Listagem</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop

@push('css')
<style>

    </style>
@endpush

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
