{{ Form::open(['action' => 'PresupuestoController@store', 'method' => 'POST', 'class' => 'form-horizontal']) }}
{!! Form::hidden('paciente_id', $paciente->id) !!}
<div class="form-group row">
    {!! Form::label('presup_descripcion', 'Descripción', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-6">
        {!! Form::text('presup_descripcion', null, ['class' => 'form-control form-control-sm'.($errors->has('presup_descripcion') ? ' is-invalid' : ''), 'placeholder' =>
        'indique descripción']) !!}
        @if ($errors->has('presup_descripcion'))
            <span class="invalid-feedback">
               <strong>{{ $errors->first('presup_descripcion') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('presta_nombre', 'Prestacion', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-6">
        {!! Form::select('prestaciones[]', $prestaciones, null, ['class' => 'form-control form-control-sm select-prestaciones']) !!}
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
<script>
    $(".select-prestaciones").select2({
        placeholder: 'Seleccione Prestacion',
        allowClear: true
    });
</script>
