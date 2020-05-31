{{ Form::open(['action' => 'PresupuestoController@store', 'method' => 'POST', 'class' => 'form-horizontal']) }}
    <div class="form-group row">
        <div class="col-sm-8">
            {!! Form::text('presup_descripcion', null, ['class' => 'form-control form-control-sm'.($errors->has('presup_descripcion') ? ' is-invalid' : ''), 'placeholder' =>
            'indique nombre prestación']) !!}
            @if ($errors->has('presup_descripcion'))
                <span class="invalid-feedback">
               <strong>{{ $errors->first('presup_descripcion') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        {!! Form::label('presup_expiracion', 'Fecha Expiración', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-8">
            {!! Form::text('presup_expiracion', null, ['class' => 'form-control form-control-sm'.($errors->has('presup_expiracion') ? ' is-invalid' : ''), 'placeholder' =>
            'indique fecha expiración']) !!}
            @if ($errors->has('presup_expiracion'))
                <span class="invalid-feedback">
               <strong>{{ $errors->first('presup_expiracion') }}</strong>
            </span>
            @endif
        </div>
    </div>
{{ Form::close() }}
