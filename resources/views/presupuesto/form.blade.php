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
    {!! Form::label('presta_descripcion', 'Descripcion', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('presta_descripcion', null, ['class' => 'form-control form-control-sm'.($errors->has('presta_descripcion') ? ' is-invalid' : ''),
    'placeholder' => 'Ingrese Descripcion']) !!}
        @if ($errors->has('presta_descripcion'))
            <span class="invalid-feedback">
                          <strong>{{ $errors->first('presta_descripcion') }}</strong>
                        </span>
        @endif
    </div>
</div>

<div class="form-group row">
    {!! Form::label('presta_valor', 'Valor', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-5">
        {!! Form::number('presta_valor',null, ['class' => 'form-control form-control-sm'.($errors->has('presta_valor') ? '
        is-invalid' : ''), 'placeholder' => 'ingrese valor']) !!}
        @if ($errors->has('presta_valor'))
            <span class="invalid-feedback">
                          <strong>{{ $errors->first('presta_valor') }}</strong>
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
        <a href="{{ url('prestacion') }}" style="text-decoration: none">
            {{ Form::button('Cancelar', ['class' => 'btn bg-gradient-secondary btn-sm btn-block'] ) }}
        </a>
    </div>
</div>
{{ Form::close() }}
