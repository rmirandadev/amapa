<div class="row">
    <div class="col-md-12 mb-3">
        {!! Form::label('name', 'Nome'); !!}
        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
        @error('name')
        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
        @enderror
    </div>
    <div class="col-md-3 mb-3">
        {!! Form::label('initial_date', 'Data inicial'); !!}
        {!! Form::date('initial_date',null,['class' => 'form-control' . ( $errors->has('initial_date') ? ' is-invalid' : '' )]) !!}
        @error('initial_date')
        <small class="form-text text-danger">{{ $errors->first('initial_date') }}</small>
        @enderror
    </div>
    <div class="col-md-3 mb-3">
        {!! Form::label('initial_hour', 'Hora inicial'); !!}
        {!! Form::time('initial_hour',null,['class' => 'form-control' . ( $errors->has('initial_hour') ? ' is-invalid' : '' )]) !!}
        @error('initial_hour')
        <small class="form-text text-danger">{{ $errors->first('initial_hour') }}</small>
        @enderror
    </div>
    <div class="col-md-3 mb-3">
        {!! Form::label('final_date', 'Data final'); !!}
        {!! Form::date('final_date',null,['class' => 'form-control' . ( $errors->has('final_date') ? ' is-invalid' : '' )]) !!}
        @error('final_date')
        <small class="form-text text-danger">{{ $errors->first('final_date') }}</small>
        @enderror
    </div>
    <div class="col-md-3 mb-3">
        {!! Form::label('final_hour', 'Hora final'); !!}
        {!! Form::time('final_hour',null,['class' => 'form-control' . ( $errors->has('final_hour') ? ' is-invalid' : '' )]) !!}
        @error('final_hour')
        <small class="form-text text-danger">{{ $errors->first('final_hour') }}</small>
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
        {!! Form::label('local', 'Local'); !!}
        {!! Form::text('local',null,['class' => 'form-control' . ( $errors->has('local') ? ' is-invalid' : '' )]) !!}
        @error('local')
        <small class="form-text text-danger">{{ $errors->first('local') }}</small>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        {!! Form::label('contact', 'Contato'); !!}
        {!! Form::text('contact',null,['class' => 'form-control' . ( $errors->has('contact') ? ' is-invalid' : '' )]) !!}
        @error('contact')
        <small class="form-text text-danger">{{ $errors->first('contact') }}</small>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        {!! Form::label('status', 'Status'); !!}
        {!! Form::select('status', \App\Models\Social::STATUS, null,['class' => 'form-control form-group select2','placeholder' => 'Selecione...']); !!}
        @error('status')
        <small class="form-text text-danger">{{ $errors->first('status') }}</small>
        @enderror
    </div>
</div>
