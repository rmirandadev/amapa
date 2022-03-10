<div class="row">
    <div class="col-md-12 mb-3">
        {!! Form::label('name', 'Nome'); !!}
        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
        @error('name')
        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
        @enderror
    </div>

    <div class="col-md-12 form-group">
        {!! Form::label('plataform_id', 'Plataforma'); !!}
        {!! Form::select('plataform_id',$plataforms,null,['class'=>'form-control select2', 'id'=>'plataform_id', 'placeholder' => 'Selecione uma plataforma'])!!}
        @error('plataform_id')
        <small class="form-text text-danger">{{ $errors->first('plataform_id') }}</small>
        @enderror
    </div>
    <div class="col-md-12 form-group">
        {!! Form::label('local_id', 'Local do anúncio'); !!}
        {!! Form::select('local_id',$locals, $ads->local_id ?? null, ['placeholder' => 'Selecione uma plataforma primeiro','class'=>'form-control select2','id'=>'local_id']); !!}
        @error('local_id')
        <small class="form-text text-danger">{{ $errors->first('local_id') }}</small>
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
        {!! Form::label('image', 'Imagem'); !!}
        <div class="custom-file">
            {!! Form::file('image',['class' => 'input-group custom-file-input'. ( $errors->has('image') ? ' is-invalid' : '' )]) !!}
            {!! Form::label('image', 'Selecione uma foto',['class' => 'custom-file-label']); !!}
            @error('image')
            <small class="form-text text-danger">{{ $errors->first('image') }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        {!! Form::label('initial_date', 'Data inicial'); !!}
        {!! Form::date('initial_date',null,['class' => 'form-control' . ( $errors->has('initial_date') ? ' is-invalid' : '' )]) !!}
        @error('initial_date')
        <small class="form-text text-danger">{{ $errors->first('initial_date') }}</small>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        {!! Form::label('final_date', 'Data final'); !!}
        {!! Form::date('final_date',null,['class' => 'form-control' . ( $errors->has('final_date') ? ' is-invalid' : '' )]) !!}
        @error('final_date')
        <small class="form-text text-danger">{{ $errors->first('final_date') }}</small>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        {!! Form::label('status', 'Status'); !!}
        {!! Form::select('status', \App\Models\Banner::STATUS, null,['class' => 'form-control form-group select2','placeholder' => 'Selecione...']); !!}
        @error('status')
        <small class="form-text text-danger">{{ $errors->first('status') }}</small>
        @enderror
    </div>
</div>
