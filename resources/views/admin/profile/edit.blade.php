@extends('adminlte::page')

@section('title', env('APP_NAME') . ' - Perfis')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-id-card"></i> Perfis</h5>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {!! Form::model($role, array('method' => 'PUT','route' => ['profile.update', $role->id])) !!}
                <div class="card-header bg-info">Atualizar perfil</div>
                <div class="card-body">
                    @include('admin.profile._form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{route('profile.index')}}" class="btn btn-warning text-white"> <i class="fas fa-list"></i> Listagem</a>
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
