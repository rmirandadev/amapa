@extends('adminlte::page')

@section('title', env('APP_NAME') . ' -  Banners')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-image"></i> Banners</h5>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {!! Form::model($banner, array('method' => 'PUT','route' => ['banner.update', $banner->id],'files' => true)) !!}
                <div class="card-header bg-info">Atualizar prova</div>
                <div class="card-body">
                    @include('admin.banner._form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{route('banner.index')}}" class="btn btn-warning text-white"> <i class="fas fa-list"></i> Listagem</a>
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

        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
@stop
