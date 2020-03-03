@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-header mb-3">
            <h2 class="title">Pacientes
                {!! Form::open(['route' => 'paciente.index', 'method' => 'GET', 'class' => 'form-inline float-right'])
                !!}
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
</div>

@if(session()->has('success'))
<div id="alert" class="alert alert-success text-center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{ session('success') }}</strong>
</div>
@elseif(session()->has('danger'))
<div id="alert" class="alert alert-danger text-center">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{ session('danger') }}</strong>
</div>
@endif

<div class="row">
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
        <div class="form-group d-inline-flex align-self-stretch">
            <a id="new" class="btn btn-success mx-2" href="{{ route('paciente.create') }}">Nuevo
                <i class="fas fa-plus"></i>
            </a>
            <a href="{{ route('home') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Atras</a>

        </div>
        <div>
            {{ $pacientes->links() }}
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
            $('#alert').delay(2000).slideUp(200, function () {
                $(this).remove();
            });
        }, 5000);
</script>
<script>
    $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
</script>
@stop
