{{ Form::open(['action' => 'PrestacionController@store', 'method' => 'POST', 'class' => 'form-horizontal']) }}
<div class="form-group row">
    {!! Form::label('presta_nombre', 'Nombre', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('presta_nombre', null, ['class' => 'form-control form-control-sm'.($errors->has('presta_nombre') ? ' is-invalid' : ''), 'placeholder' =>
        'indique nombre prestación']) !!}
        @if ($errors->has('presta_nombre'))
            <span class="invalid-feedback">
               <strong>{{ $errors->first('presta_nombre') }}</strong>
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
