@extends('adminlte::page')

@section('title', env('APP_NAME') . ' - Detalhes')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-file-alt"></i> Detalhes</h5>
@stop

@section('content')
    <div class="card card-warning card-outline">
        <div class="card-header">
            <h3 class="card-title mt-2">Detalhes da notícia</h3>
            <div class="card-tools">
                @role('Administrador|Editor')
                    <a href="{{route('post.edit',$post->id)}}" class="btn btn-info btn-sm"> <i class="fas fa-edit"></i> Editar</a>
                @endrole

                @role('Assessor')
                @if($post->finished == 0)
                    <a href="{{route('post.edit',$post->id)}}" class="btn btn-info btn-sm"> <i class="fas fa-edit"></i> Editar</a>
                @else
                    <button href="" class="btn btn-info btn-sm" disabled><i class="fas fa-edit"></i> Editar</button>
                @endif
                @endrole
            </div>
        </div>
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">

                            <div class="card">
                                <div class="card-header card-info card-outline">
                                    <h3 class="card-title"><i class="fas fa-image"></i> Imagem da notícia</h3>
                                </div>
                                <div class="card-body">
                                    @if(isset($post->image))
                                        <img src="{{URL::asset('storage/posts/'.$post->image) }}" class="img-fluid img-thumbnail" alt="">
                                        <div class="alert alert-secondary mt-2">
                                            <div class="text-white"><strong>Legenda:</strong> {{ $post->image_legend }}</div>
                                            <div class="text-white"><strong>Fotografo:</strong> {{ $post->image_photographer }}</div>
                                        </div>
                                    @else
                                        <div class="alert alert-warning">
                                            <strong><i class="fas fa-times-circle"></i></strong> Sem imagem cadastrada.
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Data de Cadastro</b> <span class="float-right">{{ date('d/m/Y',strtotime($post->created_at)) }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Data de Edição</b> <span class="float-right">{{ date('d/m/Y',strtotime($post->updated_at)) }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Data de publicação</b> <span class="float-right">{{ date('d/m/Y',strtotime($post->publication_date)) }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Status</b> <span class="float-right">{!! $post->StatusView !!}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Finalizada</b> <span class="float-right">{!! $post->FinishedView !!}</span>
                                        </li>
                                        @if(isset($post->user_finished_id))
                                            <li class="list-group-item">
                                                <b>Finalizada por:</b> <span class="float-right">{!! $post->userfinished->name !!}</span>
                                            </li>
                                        @endif
                                        <li class="list-group-item">
                                            <b>Página principal</b> <span class="float-right">{!! $post->HightlightView !!}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Visualizações</b> <span class="float-right">{{ $post->clicks }}</span>
                                        </li>
                                    </ul>
                                    {{--                                    @unlessrole('Administrador')--}}
                                    {{--                                    <a href="{{ route('communication.edit',Auth::user()->id) }}" class="btn btn-info btn-block"><i class="fas fa-edit"></i> Editar seu perfil</a>--}}
                                    {{--                                    @endunlessrole--}}
                                </div>
                            </div>



                            <div class="card">
                                <div class="card-header card-success card-outline">
                                    <h3 class="card-title"><i class="fa fa-users"></i> Assessores vínculados</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nome</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($post->users as $users)
                                            <tr>
                                                <td>{{ $users->name }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header card-success card-outline">
                                    <h3 class="card-title"><i class="fas fa-sitemap"></i> Sites externos vínculados</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nome</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($post->companies as $companies)
                                            <tr>
                                                <td>{{ $companies->initials }} - {{ $companies->name }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-8">

                            <div class="card">
                                <div class="card-header card-success card-outline">
                                    <h3 class="card-title"><i class="fab fa-buffer"></i> Área no site</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Categoria</th>
                                            <th>Subcategoria</th>
                                            <th class="text-center">Cor</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $post->category->name }}</td>
                                            <td>{{ $post->subcategory->name }}</td>
                                            <td class="text-center"><i style="color: {{$post->category->color}}" class="fas fa-circle"></i></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header card-secondary card-outline">
                                    <h3 class="card-title"><i class="far fa-newspaper"></i> Matéria</h3>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote">
                                        <p>{{ $post->title }}</p>
                                        <footer class="blockquote-footer">{{ $post->subtitle }}</footer>
                                        <small>Por: {{ $post->user->name }}</small>
                                    </blockquote>
                                    <hr/>
                                    {!! $post->text !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


@stop

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endpush

@push('js')
    @include('sweetalert::alert')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.10.25/sorting/date-uk.js"></script>
    <script>
        $(document).ready( function () {
                $('#table').DataTable({
                    ordering: true,
                    language: {"url":"//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"},
                });
            }
        );
    </script>
@endpush
