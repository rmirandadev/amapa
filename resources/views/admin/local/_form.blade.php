<div class="row">
    <div class="col-md-12 mb-3">
        {!! Form::label('plataform_id', 'Plataforma'); !!}
        {!! Form::select('plataform_id', $plataforms, null,['class' => 'form-control select2','placeholder' => 'Selecione...']); !!}
        @error('plataform_id')
        <small class="form-text text-danger">{{ $errors->first('plataform_id') }}</small>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        {!! Form::label('name', 'Nome'); !!}
        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
        @error('name')
        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        {!! Form::label('width', 'Largura'); !!}
        {!! Form::number('width',null,['class' => 'form-control' . ( $errors->has('width') ? ' is-invalid' : '' )]) !!}
        @error('width')
        <small class="form-text text-danger">{{ $errors->first('width') }}</small>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        {!! Form::label('height', 'Altura'); !!}
        {!! Form::number('height',null,['class' => 'form-control' . ( $errors->has('height') ? ' is-invalid' : '' )]) !!}
        @error('height')
        <small class="form-text text-danger">{{ $errors->first('height') }}</small>
        @enderror
    </div>
</div>
