<div class="modal fade col-md-12" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Paciente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::open([ 'url' => url('paciente/test'), 'route' => route('paciente.update', 'test'),'method' => 'PUT']) }}
                {{ Form::hidden('pcte_id', '', ['id' => 'pcte_id']) }}
                <div class="form-group">
                    {!! Form::label('rut', 'Rut') !!}
                    {!! Form::text('rut', old('rut'), ['class' => 'form-control'.($errors->has('rut') ? '
                    is-invalid' : ''), 'id' => 'rut'
                    ]) !!}
                    @if ($errors->has('rut'))
                        <span class="invalid-feedback">
                        <strong>{{ $errors->first('rut') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('nombres', 'Nombres') !!}
                    {!! Form::text('nombres', null, ['class' => 'form-control'.($errors->has('nombres') ?
                    ' is-invalid'
                    : '')]) !!}
                    @if ($errors->has('nombres'))
                        <span class="invalid-feedback">
                        <strong>{{ $errors->first('nombres') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::label('apellido_paterno', 'Apellido Paterno') !!}
                        {!! Form::text('apellido_paterno',null, ['class' =>
                        'form-control'.($errors->has('apellido_paterno') ? ' is-invalid' : '')]) !!}
                        @if ($errors->has('apellido_paterno'))
                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('apellido_paterno') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col form-group">
                        {!! Form::label('apellido_materno', 'Apellido Materno') !!}
                        {!! Form::text('apellido_materno',null, ['class' => 'form-control']) !!}
                    </div>
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
<script type="text/javascript">
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var rut = button.data('formrut')
        var nombres = button.data('formnombres')
        var apellido_paterno = button.data('formapellidopaterno')
        var apellido_materno = button.data('formapellidomaterno')
        var fecha_nacimiento = button.data('formfechanacimiento')
        var pcte_id = button.data('formpcteid')


        $('#editModal').find('.modal-body #rut').val(rut)
        $('#editModal').find('.modal-body #nombres').val(nombres)
        $('#editModal').find('.modal-body #apellido_paterno').val(apellido_paterno)
        $('#editModal').find('.modal-body #apellido_materno').val(apellido_materno)
        $('#editModal').find('.modal-body #fecha_nacimiento').val(fecha_nacimiento)
        $('#editModal').find('.modal-body #pcte_id').val(pcte_id)

    });
    @error ('rut')
    $('#editModal').modal('show');
    @enderror
    @error ('nombres')
    $('#editModal').modal('show');
    @enderror
    @error ('apellido_paterno')
    $('#editModal').modal('show');
    @enderror
</script>
