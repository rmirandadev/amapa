<div class="row">
    <div class="col-md-12 mb-3">
        {!! Form::label('type', 'Tipo'); !!}
        {!! Form::select('type', \App\Models\Company::TYPE, null,['class' => 'form-control form-group select2','placeholder' => 'Selecione...']); !!}
        @error('type')
        <small class="form-text text-danger">{{ $errors->first('type') }}</small>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        {!! Form::label('name', 'Nome'); !!}
        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
        @error('name')
        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        {!! Form::label('initials', 'Sigla'); !!}
        {!! Form::text('initials',null,['class' => 'form-control' . ( $errors->has('initials') ? ' is-invalid' : '' )]) !!}
        @error('initials')
        <small class="form-text text-danger">{{ $errors->first('initials') }}</small>
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
        {!! Form::label('status', 'Status'); !!}
        {!! Form::select('status', \App\Models\Company::STATUS, null,['class' => 'form-control form-group select2','placeholder' => 'Selecione...']); !!}
        @error('status')
        <small class="form-text text-danger">{{ $errors->first('status') }}</small>
        @enderror
    </div>
</div>
