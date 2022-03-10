@extends('adminlte::page')

@section('title', env('APP_NAME') . ' - Categorias')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-boxes"></i> Categorias</h5>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {!! Form::model($category, array('method' => 'PUT','route' => ['category.update', $category->id])) !!}
                <div class="card-header bg-info">Atualizar Categoria</div>
                <div class="card-body">
                    @include('admin.category._form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{route('category.index')}}" class="btn btn-warning text-white"> <i class="fas fa-list"></i> Listagem</a>
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
