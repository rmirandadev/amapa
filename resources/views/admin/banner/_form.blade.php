<div class="row">
    <div class="col-md-12 mb-3">
        {!! Form::label('title', 'Título'); !!}
        {!! Form::text('title',null,['class' => 'form-control' . ( $errors->has('title') ? ' is-invalid' : '' )]) !!}
        @error('title')
        <small class="form-text text-danger">{{ $errors->first('title') }}</small>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        {!! Form::label('subtitle', 'Subtítulo'); !!}
        {!! Form::text('subtitle',null,['class' => 'form-control' . ( $errors->has('subtitle') ? ' is-invalid' : '' )]) !!}
        @error('subtitle')
        <small class="form-text text-danger">{{ $errors->first('subtitle') }}</small>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        {!! Form::label('link', 'Link'); !!}
        {!! Form::text('link',null,['class' => 'form-control' . ( $errors->has('link') ? ' is-invalid' : '' )]) !!}
        @error('link')
        <small class="form-text text-danger">{{ $errors->first('link') }}</small>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        {!! Form::label('image', 'Imagem (800 x 350) pixels'); !!}
        <div class="custom-file">
            {!! Form::file('image',['class' => 'input-group custom-file-input'. ( $errors->has('image') ? ' is-invalid' : '' )]) !!}
            {!! Form::label('image', 'Selecione uma foto',['class' => 'custom-file-label']); !!}
            @error('image')
            <small class="form-text text-danger">{{ $errors->first('image') }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-12 mb-3">
        {!! Form::label('status', 'Status'); !!}
        {!! Form::select('status', \App\Models\Banner::STATUS, null,['class' => 'form-control form-group select2','placeholder' => 'Selecione...']); !!}
        @error('status')
        <small class="form-text text-danger">{{ $errors->first('status') }}</small>
        @enderror
    </div>
</div>
