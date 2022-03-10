@extends('adminlte::page')

@section('title', env('APP_NAME') . ' - Página inicial')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-home"></i> Página inicial</h5>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $post_count }}</h3>

                    <p>Notícias cadastradas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <a href="{{ route('post.index') }}" class="small-box-footer">Listagem completa <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $banner_count }}</h3>

                    <p>Banners ativos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-image"></i>
                </div>
                <a href="{{ route('banner.index') }}" class="small-box-footer">Listagem completa <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $event_count }}</h3>

                    <p>Eventos cadastrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-week"></i>
                </div>
                <a href="{{ route('event.index') }}" class="small-box-footer">Listagem completa <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $user_count }}</h3>

                    <p>Usuários cadastrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('user.index') }}" class="small-box-footer">Listagem completa <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')

@stop
