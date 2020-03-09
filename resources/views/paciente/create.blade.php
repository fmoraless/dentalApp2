<div class="modal fade col-md-12" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Crear Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::open(['action' => 'PacienteController@store', 'method' => 'POST', 'id' => 'formCreate']) }}
                <div class="form-group">
                    {!! Form::label('rut', 'Rut') !!}
                    {!! Form::text('rut', null, ['class' => 'form-control'.($errors->has('rut') ? ' is-invalid' : ''), 'placeholder' => '00000000-X', 'id' => 'rut'
                    ]) !!}
                    @if ($errors->has('rut'))
                        <span class="invalid-feedback">
                          <strong>{{ $errors->first('rut') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('nombres', 'Nombres') !!}
                    {!! Form::text('nombres', null, ['class' => 'form-control'.($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => 'Ingrese Nombres']) !!}
                    @if ($errors->has('nombres'))
                        <span class="invalid-feedback">
                          <strong>{{ $errors->first('nombres') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('apellido_paterno', 'Apellido Paterno') !!}
                        {!! Form::text('apellido_paterno',null, ['class' => 'form-control'.($errors->has('apellido_paterno') ? ' is-invalid' : ''), 'placeholder' => 'Apellido Paterno']) !!}
                        @if ($errors->has('apellido_paterno'))
                            <span class="invalid-feedback">
                          <strong>{{ $errors->first('apellido_paterno') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col form-group">
                        {!! Form::label('apellido_materno', 'Apellido Materno') !!}
                        {!! Form::text('apellido_materno',null, ['class' => 'form-control', 'placeholder'
                        => 'Apellido Materno']) !!} </div>
                </div>
                <div class="col form-group">
                    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento') !!}
                    {!! Form::date('fecha_nacimiento',null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/paciente.js') }}"></script>
{{--<script type="text/javascript">
    --}}{{--$('#createModal').on('shown.bs.modal', function () {
        $('#rut').trigger('focus')
    });
    @error('rut')
    $('#createModal').modal('show');
    @enderror
    @error('nombres')
    $('#createModal').modal('show');
    @enderror
    @error('apellido_paterno')
    $('#createModal').modal('show');
    @enderror
</script>--}}
