@extends('adminlte::page')

@section('title', env('APP_NAME') . ' -  Publicidade')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-ad"></i> Publicidade</h5>
@stop
s
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {!! Form::open(['route' => 'ads.store','files' => true]) !!}
                <div class="card-header bg-success">Adicionar publicidade</div>
                <div class="card-body">
                   @include('admin.ads._form')
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    <a href="{{route('ads.index')}}" class="btn btn-warning text-white"> <i class="fas fa-list"></i> Listagem</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info">Dimensões</div>
                <div class="card-body">
                    @foreach($plataformList as $plataform)
                        <h6 class="text-secondary">{{ $plataform->name }}</h6>
                        <table class="table table-sm table-striped mb-5">
                            <thead>
                            <tr>
                                <th>Local</th>
                                <th class="text-center w-25">Largura</th>
                                <th class="text-center w-25">Altura</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($plataform->locals as $local)
                                <tr>
                                    <td>{{ $local->name }}</td>
                                    <td class="text-center">{{ $local->width }} px</td>
                                    <td class="text-center">{{ $local->height }} px</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
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

        //Dynamic Dropdown
        var selected_plataform_id = '{{ old('plataform_id') }}';
        if (selected_plataform_id.length > 0) {
            getStateAreas(selected_plataform_id);
        }
        function getStateAreas(plataform_id){
            var ajax_url = "{{route('get-ads-local','')}}"+"/"+plataform_id
            $.get( ajax_url, function( data ) {
                $('#local_id').empty().append('<option value="">Selecione um local na plataforma</option>');
                $.each(data, function(id,name){
                    $('#local_id').append('<option value='+id+'>'+name+'</option>');
                });
                var selected_local_id = '{{ old('local_id') }}';
                if (selected_local_id.length > 0) {
                    $('#local_id').val(selected_local_id);
                }
            });
        }
        $( "#plataform_id" ).change(function() {
            var plataform_id = $(this).val();
            if(plataform_id) {
                getStateAreas(plataform_id);
            }else{
                $('#local_id').empty().append('<option value="">Selecione uma plataforma primeiro</option>');
            }
        });
    </script>
@stop
