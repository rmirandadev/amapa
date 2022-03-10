@extends('adminlte::page')

@section('title', env('APP_NAME') . ' - Detalhes')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-user"></i> Detalhes</h5>
@stop

@section('content')
    <div class="card card-warning card-outline">
        <div class="card-header">
            <h3 class="card-title mt-2">Detalhes do usuário</h3>
            @role('Administrador')
            <div class="card-tools">
                <a href="{{route('user.index')}}" class="btn btn-warning btn-sm text-white"> <i class="fas fa-list"></i> Listagem</a>
                <a href="{{route('user.edit',$user->id)}}" class="btn btn-info btn-sm text-white"> <i class="fas fa-edit"></i> Editar</a>
            </div>
            @endrole
        </div>
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <i class="fas fa-user fa-4x"></i>
                                    </div>

                                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                    <p class="text-muted text-center">{{ $user->email }}</p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Situação</b> <span class="float-right">{!! $user->StatusView !!}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Data de criação</b> <span class="float-right"><i class="fas fa-calendar-alt"></i> {{ date('d/m/y',strtotime($user->created_at)) }} - {{ date('H:i',strtotime($user->created_at)) }}h</span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Ultima atualização</b> <span class="float-right"><i class="fas fa-calendar-alt"></i> {{ date('d/m/y',strtotime($user->updated_at)) }} - {{ date('H:i',strtotime($user->updated_at)) }}h</span>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Perfis</b>
                                            <span class="float-right">
                                             @forelse ($user->roles as $role)
                                                    <span class="badge badge-primary">{{$role->name}}</span>
                                                @empty
                                                    <span class="badge badge-warning">Sem perfil</span>
                                                @endforelse
                                            </span>
                                        </li>
                                    </ul>
                                    @unlessrole('Administrador')
                                    <a href="{{ route('communication.edit',Auth::user()->id) }}" class="btn btn-info btn-block"><i class="fas fa-edit"></i> Editar seu perfil</a>
                                    @endunlessrole
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-success card-outline">
                                    <h3 class="card-title"><i class="fas fa-user"></i> Histórico de autenticação</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover table-striped mb-3" id="table">
                                        <thead>
                                        <tr>
                                            <th>Ultimo Login</th>
                                            <th>IP</th>
                                            <th>Sistema Operacional</th>
                                            <th>Browser</th>
                                            <th>Dispositivo</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($user->monitor as $monitor)
                                            <tr>
                                                <td><i class="fas fa-calendar-alt"></i> {{ date('d/m/y',strtotime($monitor->created_at)) }} - {{ date('H:i',strtotime($monitor->created_at)) }}h</td>
                                                <td>{{ $monitor->ip }}</td>
                                                <td>{{ $monitor->os }}</td>
                                                <td>{{ $monitor->browsers }}</td>
                                                <td>{{ $monitor->device }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Sem Resultados</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
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
