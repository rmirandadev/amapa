@extends('adminlte::page')

@section('title', env('APP_NAME') . ' - Usuários')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-users"></i> Usuários</h5>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @role('Administrador')
                {!! Form::model($user, array('method' => 'PUT','route' => ['user.update', $user->id])) !!}
                @else
                {!! Form::model($user, array('method' => 'PUT','route' => ['communication.update', $user->id])) !!}
                @endrole
                <div class="card-header bg-info">Atualizar usuário</div>
                <div class="card-body">
                    @include('admin.user._form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    @role('Administrador')
                    <a href="{{route('user.index')}}" class="btn btn-warning text-white"> <i class="fas fa-list"></i> Listagem</a>
                    @else
                        <a href="{{route('communication.show',Auth::user()->id)}}" class="btn btn-warning text-white"> <i class="fas fa-list"></i> Tela de perfil</a>
                    @endrole
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
