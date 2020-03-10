{{ Form::open(['action' => 'PacienteController@store', 'method' => 'POST', 'class' => 'form-horizontal']) }}
<div class="form-group row">
    {!! Form::label('rut', 'Rut', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('rut', null, ['class' => 'form-control form-control-sm'.($errors->has('rut') ? ' is-invalid' : ''), 'placeholder' =>
        '00000000-X']) !!}
        @if ($errors->has('rut'))
            <span class="invalid-feedback">
               <strong>{{ $errors->first('rut') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {!! Form::label('nombres', 'Nombres', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('nombres', null, ['class' => 'form-control form-control-sm'.($errors->has('nombres') ? ' is-invalid' : ''),
    'placeholder' => 'Ingrese Nombres']) !!}
        @if ($errors->has('nombres'))
            <span class="invalid-feedback">
                          <strong>{{ $errors->first('nombres') }}</strong>
                        </span>
        @endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label('apellidos', 'Apellidos', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-5">
        {!! Form::text('apellido_paterno',null, ['class' => 'form-control form-control-sm'.($errors->has('apellido_paterno') ? '
        is-invalid' : ''), 'placeholder' => 'Apellido Paterno']) !!}
        @if ($errors->has('apellido_paterno'))
            <span class="invalid-feedback">
                          <strong>{{ $errors->first('apellido_paterno') }}</strong>
                        </span>
        @endif
    </div>
    <div class="col-sm-5">
        {!! Form::text('apellido_materno',null, ['class' => 'form-control form-control-sm'.($errors->has('apellido_materno') ? '
        is-invalid' : ''), 'placeholder' => 'Apellido Materno']) !!}
        @if ($errors->has('apellido_materno'))
            <span class="invalid-feedback">
                          <strong>{{ $errors->first('apellido_materno') }}</strong>
                        </span>
        @endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label('fecha_nacimiento', 'Fecha Nac.', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-5">
        {!! Form::date('fecha_nacimiento',null, ['class' => 'form-control form-control-sm']) !!}
    </div>
    <div class="col-sm-5">
        {!! Form::select('sexo', ['Femenino' => 'Femenino', 'Masculino' => 'Masculino', 'Otro' => 'otro'], null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione Sexo']) !!}
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        {{ Form::submit('Guardar', ['class' => 'btn bg-gradient-primary btn-sm btn-block']) }}
    </div>
    <div class="col">
        <a href="{{ url('paciente') }}">
            {{ Form::button('Cancelar', ['class' => 'btn bg-gradient-secondary btn-sm btn-block'] ) }}
        </a>
    </div>
</div>
{{ Form::close() }}
