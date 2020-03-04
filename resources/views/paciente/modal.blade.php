<div class="modal fade col-md-12" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::open(['action' => 'PacienteController@store', 'method' => 'POST']) }}
                <div class="form-group">
                    {!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Nombres',
                    'autofocus'=> 'autofocus']) !!}
                </div>
                <div class="row">
                    <div class="col form-group">
                        {!! Form::text('apellido_paterno',null, ['class' => 'form-control', 'placeholder' => 'Apellido Paterno']) !!}
                    </div>
                    <div class="col form-group"> {!! Form::text('apellido_materno',null, ['class' => 'form-control', 'placeholder'
                        => 'Apellido Materno']) !!} </div>
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
