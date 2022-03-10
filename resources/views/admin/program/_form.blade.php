<div class="row">
    <div class="col-md-12 mb-3">
        {!! Form::label('name', 'Nome'); !!}
        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
        @error('name')
        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        {!! Form::label('call', 'Chamada'); !!}
        {!! Form::text('call',null,['class' => 'form-control' . ( $errors->has('call') ? ' is-invalid' : '' )]) !!}
        @error('call')
        <small class="form-text text-danger">{{ $errors->first('call') }}</small>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        {!! Form::label('image', 'Imagem (600 x 400) pixels'); !!}
        <div class="custom-file">
            {!! Form::file('image',['class' => 'input-group custom-file-input'. ( $errors->has('image') ? ' is-invalid' : '' )]) !!}
            {!! Form::label('image', 'Selecione uma foto',['class' => 'custom-file-label']); !!}
            @error('image')
            <small class="form-text text-danger">{{ $errors->first('image') }}</small>
            @enderror
        </div>
    </div>

    <div class="col-sm-12 mb-3">
        {!! Form::label('text', 'Texto'); !!}
        {!! Form::textarea('text',null,['class' => 'form-control', 'rows' => '5', 'name' => 'text']) !!}
        @error('text')
        <small class="form-text text-danger">{{ $errors->first('text') }}</small>
        @enderror
    </div>

</div>
