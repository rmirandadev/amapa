<div class="row">
    <div class="col-md-12 mb-3">
        {!! Form::label('name', 'Nome'); !!}
        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
        @error('name')
        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        {!! Form::label('initials', 'SIGLA'); !!}
        {!! Form::text('initials',null,['class' => 'form-control' . ( $errors->has('initials') ? ' is-invalid' : '' )]) !!}
        @error('initials')
        <small class="form-text text-danger">{{ $errors->first('initials') }}</small>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        {!! Form::label('image', 'Imagem (400 x 400) pixels'); !!}
        <div class="custom-file">
            {!! Form::file('image',['class' => 'input-group custom-file-input'. ( $errors->has('image') ? ' is-invalid' : '' )]) !!}
            {!! Form::label('image', 'Selecione uma foto',['class' => 'custom-file-label']); !!}
            @error('image')
            <small class="form-text text-danger">{{ $errors->first('image') }}</small>
            @enderror
        </div>
    </div>

    @isset($structure->image)
        <div class="col-sm-12 mb-3">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" name="remove" value="sim" type="checkbox"> Remover imagem existente ?
                </label>
            </div>
        </div>
    @endisset

    <div class="col-sm-12 mb-3">
        {!! Form::label('text', 'Texto'); !!}
        {!! Form::textarea('text',null,['class' => 'form-control', 'rows' => '5', 'name' => 'text']) !!}
        @error('text')
        <small class="form-text text-danger">{{ $errors->first('text') }}</small>
        @enderror
    </div>

</div>
