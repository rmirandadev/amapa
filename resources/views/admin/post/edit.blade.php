@extends('adminlte::page')

@section('title', env('APP_NAME') . ' -  Notícias')

@section('content_header')
    <h5 class="text-muted"><i class="fas fa-file-alt"></i> Notícias</h5>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {!! Form::model($post, array('method' => 'PUT','route' => ['post.update', $post->id],'files' => true)) !!}
                <div class="card-header bg-info">Atualizar prova</div>
                <div class="card-body">
                    @include('admin.post._form')
                </div>
                <div class="card-footer">

                    @role('Administrador|Editor')
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                    @endrole

                    @role('Assessor')
                        @if($post->finished == 0)
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar</button>
                        @else
                            <button type="" class="btn btn-success" disabled><i class="fas fa-save"></i> Salvar</button>
                        @endif
                    @endrole

                    <a href="{{route('post.index')}}" class="btn btn-warning text-white"> <i class="fas fa-list"></i> Listagem</a>
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
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({ width: '100%' });
        });

        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).siblings('.custom-file-label').addClass("selected").html(fileName);
        });

        CKEDITOR.replace('text');

        //Dynamic Dropdown
        var selected_category_id = '{{ old('category_id') }}';
        if (selected_category_id.length > 0) {
            getStateAreas(selected_category_id);
        }
        function getStateAreas(category_id){
            var ajax_url = "{{route('get-subcategory','')}}"+"/"+category_id
            $.get( ajax_url, function( data ) {
                $('#subcategory_id').empty().append('<option value="">Selecione uma subcategoria</option>');
                $.each(data, function(id,name){
                    $('#subcategory_id').append('<option value='+id+'>'+name+'</option>');
                });
                var selected_subcategory_id = '{{ old('subcategory_id') }}';
                if (selected_subcategory_id.length > 0) {
                    $('#subcategory_id').val(selected_subcategory_id);
                }
            });
        }
        $( "#category_id" ).change(function() {
            var category_id = $(this).val();
            if(category_id) {
                getStateAreas(category_id);
            }else{
                $('#subcategory_id').empty().append('<option value="">Selecione uma categoria primeiro</option>');
            }
        });
    </script>
@stop
