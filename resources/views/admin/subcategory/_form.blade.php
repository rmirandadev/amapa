<div class="row">
    <div class="col-md-12 mb-3">
        {!! Form::label('category_id', 'Categoria'); !!}
        {!! Form::select('category_id', $categories, null,['class' => 'form-control form-group select2','placeholder' => 'Selecione...']); !!}
        @error('category_id')
        <small class="form-text text-danger">{{ $errors->first('category_id') }}</small>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        {!! Form::label('name', 'Nome'); !!}
        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
        @error('name')
        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
        @enderror
    </div>
</div>
