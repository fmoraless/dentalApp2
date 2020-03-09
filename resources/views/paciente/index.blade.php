@extends('layouts.master')
@section('content')
        <div class="col-md-12">

            @if(session()->has('success'))
                <div id="alert" class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="page-header mb-3">
                <h2 class="title">Pacientes
                    {!! Form::open(['route' => 'paciente.index', 'method' => 'GET', 'class' => 'form-inline float-right'])
                    !!}

                    <div class="form-group mx-1">
                        {{ Form::text('q', null, ['class' => 'form-control', 'placeholder' => 'Buscar'], isset($q) ? $q : '') }}
                    </div>
                    <button type="submit" class="btn btn-secondary form-control"><span><i
                                class="fas fa-search"></i></span></button>
                    {!! Form::close() !!}
                </h2>
            </div>
        </div>
        <div class="col-md-12">
            <table class="table table-hover table-md-responsive table-striped">
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

                        <td><a class="btn btn-outline-secondary btn-sm"
                               data-formrut="{{ $paciente->rut }}"
                               data-formnombres="{{ $paciente->nombres }}"
                               data-formapellidopaterno="{{ $paciente->apellido_paterno }}"
                               data-formapellidomaterno="{{ $paciente->apellido_materno }}"
                               data-formfechanacimiento="{{ $paciente->fecha_nacimiento }}"
                               data-formpcteid="{{ $paciente->id }}"
                               data-toggle="modal"
                               data-target="#editModal"
                               title="Editar" href="#"><i class="fas fa-pen"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $pacientes->appends(['q' => $q])->links() }}
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                Nuevo
            </button>
            @include('paciente.create')
            @include('paciente.edit')
        </div>
    <script>
        $(document).ready(function () {
            $('#alert').delay(2000).slideUp(200, function () {
                $(this).remove();
            });
        }, 5000);
    </script>
@stop
