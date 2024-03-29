<div class="row">
    <div class="col-md-12 mb-3">
        {!! Form::label('name', 'Nome'); !!}
        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
        @error('name')
        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        {!! Form::label('color', 'Cor'); !!}
        {!! Form::color('color',null,['class' => 'form-control' . ( $errors->has('color') ? ' is-invalid' : '' )]) !!}
        @error('color')
        <small class="form-text text-danger">{{ $errors->first('color') }}</small>
        @enderror
    </div>
</div>
