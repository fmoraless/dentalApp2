@extends('layouts.master')
@section('content')
    <div class="col-md-12">

        {{--        success alert al crear--}}

        <div class="page-header">
            <div class="form-group">
                {!! Form::open(['route' => 'paciente.index', 'method' => 'GET', 'class' => 'form-inline float-right pb-2'])
                !!}
                {{ Form::text('q', null, ['class' => 'form-control mx-1', 'placeholder' => 'Buscar'], isset($q) ? $q : '') }}
                <button type="submit" class="btn btn-secondary form-control"><span><i
                                class="fas fa-search"></i></span></button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <a class="btn bg-gradient-success btn-sm" title="Nuevo Paciente" href="{{ route('paciente.create') }}">
            <i class="fas fa-user-plus">

            </i>
            Nuevo Paciente
        </a>
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
                    <td><a href="{{ route('paciente.show', $paciente->id) }}">{{ $paciente->rut }}</a></td>
                    <td>{{ $paciente->nombres }}</td>
                    <td>{{ $paciente->apellido_paterno }}</td>
                    <td>{{ $paciente->apellido_materno }}</td>

                    <td>
                        <a class="btn bg-gradient-secondary btn-sm" data-toggle="tooltip" data-placement="bottom"
                           title="Editar"
                           href="{{ route('paciente.edit', $paciente->id) }}"><i class="fas fa-pen"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $pacientes->appends(['q' => $q])->links() }}
    </div>
@stop
