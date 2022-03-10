<div class="row">
    <div class="col-md-12 mb-3">
        {!! Form::label('name', 'Nome'); !!}
        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
        @error('name')
        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        {!! Form::label('cod', 'Código'); !!}
        {!! Form::text('cod',null,['class' => 'form-control' . ( $errors->has('cod') ? ' is-invalid' : '' )]) !!}
        @error('cod')
        <small class="form-text text-danger">{{ $errors->first('cod') }}</small>
        @enderror
    </div>
    <div class="col-sm-12 mb-3">
        {!! Form::label('text', 'Descrição'); !!}
        {!! Form::textarea('text',null,['class' => 'form-control', 'rows' => '5', 'name' => 'text']) !!}
        @error('text')
        <small class="form-text text-danger">{{ $errors->first('text') }}</small>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        {!! Form::label('status', 'Status'); !!}
        {!! Form::select('status', \App\Models\Video::STATUS, null,['class' => 'form-control form-group select2','placeholder' => 'Selecione...']); !!}
        @error('status')
        <small class="form-text text-danger">{{ $errors->first('status') }}</small>
        @enderror
    </div>
</div>
