{{ Form::open(['action' => 'MensajeController@store', 'method' => 'POST', 'class' => 'form-horizontal']) }}
{!! Form::hidden('paciente_id', $paciente->id) !!}
<div class="form-group row">
    {!! Form::label('fecha_mensaje', 'Fecha Mensaje', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-5">
        {!! Form::date('fecha_mensaje',null, ['class' => 'form-control form-control-sm'.($errors->has('fecha_mensaje') ? ' is-invalid' : old('fecha_mensaje'))]) !!}
        @if ($errors->has('fecha_mensaje'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('fecha_mensaje') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label('titulo_mensaje', 'Titulo', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('titulo_mensaje', null, ['class' => 'form-control
        form-control-sm'.($errors->has('titulo_mensaje') ? ' is-invalid' : ''), 'placeholder' =>
        'Titulo del mensaje']) !!}
        @if ($errors->has('titulo_mensaje'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('titulo_mensaje') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="form-group row">
    {!! Form::label('cuerpo_mensaje', 'Cuerpo del Mensaje', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('cuerpo_mensaje', null, ['class' => 'form-control
        form-control-sm'.($errors->has('cuerpo_mensaje') ? ' is-invalid' : ''),
        'placeholder' => 'Ingrese cuerpo del mensaje']) !!}
        @if ($errors->has('cuerpo_mensaje'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('cuerpo_mensaje') }}</strong>
        </span>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        {{ Form::submit('Guardar', ['class' => 'btn bg-gradient-primary btn-sm btn-block']) }}
    </div>
    <div class="col">
        <a href="{{ url('/paciente/'.$paciente->id) }}" style="text-decoration:none">
            {{ Form::button('Cancelar', ['class' => 'btn bg-gradient-secondary btn-sm btn-block'] ) }}
        </a>
    </div>
</div>
{{ Form::close() }}
