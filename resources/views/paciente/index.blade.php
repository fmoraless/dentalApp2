@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header mb-3">
                <h2 class="title">Pacientes
                    {!! Form::open(['route' => 'paciente.index', 'method' => 'GET', 'class' => 'form-inline float-right'])
                    !!}
                    <div class="form-group mx-1">
                        {{ Form::text('rut', null, ['class' => 'form-control', 'placeholder' => 'Rut']) }}
                    </div>
                    <div class="form-group mx-1">
                        {{ Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Nombres']) }}
                    </div>
                    <div class="form-group mx-1">
                        {{ Form::text('apellido_paterno', null, ['class' => 'form-control', 'placeholder' => 'Apellido Paterno']) }}
                    </div>
                    <div class="form-group mx-1">
                        {{ Form::text('apellido_materno', null, ['class' => 'form-control', 'placeholder' => 'Apellido Materno']) }}
                    </div>
                    <div class="form-group mx-1">
                        <button type="submit" class="btn btn-secondary form-control"><span><i
                                        class="fas fa-search"></i></span></button>
                    </div>
                    {!! Form::close() !!}
                </h2>
            </div>
        </div>
        <div class="col-sx-12 col-md-12">
            <table class="table table-hover table-sm-responsive table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>Rut</th>
                    <th>Nombres</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th colspan="2" class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach($pacientes as $paciente)

                    <tr>
                        <td>{{ $paciente->rut }}</td>
                        <td>{{ $paciente->nombres }}</td>
                        <td>{{ $paciente->apellido_paterno }}</td>
                        <td>{{ $paciente->apellido_materno }}</td>

                        <td><a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="bottom"
                               title="Detalle Pdf" href="{{ url('paciente/'.$paciente->id) }}" target="_blank"><i
                                        class="fas fa-file-pdf"></i></a></td>

                        <td><a class="btn btn-outline-secondary btn-sm" data-toggle="tooltip" data-placement="bottom"
                               title="Editar" href="{{ url('paciente/'.$paciente->id.'/edit') }}"><i
                                        class="fas fa-pen"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                Nuevo
            </button>
            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
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
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
