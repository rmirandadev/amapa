<div class="row">
    <div class="col-md-12 mb-3">
        {!! Form::label('name', 'Nome'); !!}
        {!! Form::text('name',null,['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
        @error('name')
        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        {!! Form::label('email', 'E-mail'); !!}
        {!! Form::text('email',null,['class' => 'form-control' . ( $errors->has('email') ? ' is-invalid' : '' )]) !!}
        @error('email')
        <small class="form-text text-danger">{{ $errors->first('email') }}</small>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        {!! Form::label('password', 'Senha'); !!}
        {!! Form::password('password',['class' => 'form-control' . ( $errors->has('password') ? ' is-invalid' : '' )]) !!}
        @error('password')
        <small class="form-text text-danger">{{ $errors->first('password') }}</small>
        @enderror
    </div>
    @role('Administrador')
    <div class="col-md-12 mb-3">
        {!! Form::label('status', 'Status'); !!}
        {!! Form::select('status', \App\Models\User::STATUS, null,['class' => 'form-control form-group select2','placeholder' => 'Selecione...']); !!}
        @error('status')
        <small class="form-text text-danger">{{ $errors->first('status') }}</small>
        @enderror
    </div>
    <div class="col-md-12 mb-3">
        {!! Form::label('roles', 'Perfil'); !!}
        {!! Form::select('roles[]', $roles, (isset($user) ? $role : null),['multiple' => true, 'class' => 'form-control form-group select2']); !!}
        @error('roles')
        <small class="form-text text-danger">{{ $errors->first('roles') }}</small>
        @enderror
    </div>
    @endrole
</div>
