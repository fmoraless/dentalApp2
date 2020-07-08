@extends('layouts.master')
@section('content')
    <div class="col-md-12">

        {{--        success alert al crear--}}

        <div class="page-header">
            <div class="form-group">
                {!! Form::open(['route' => 'prestacion.index', 'method' => 'GET', 'class' => 'form-inline float-right pb-2'])
                !!}
                {{ Form::text('q', null, ['class' => 'form-control mx-1', 'placeholder' => 'Buscar'], isset($q) ? $q : '') }}
                <button type="submit" class="btn btn-secondary form-control"><span><i
                                class="fas fa-search"></i></span></button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <a class="btn bg-gradient-success btn-sm" title="Nueva Prestacion" href="{{ route('prestacion.create') }}">
            <i class="fas fa-user-plus">

            </i>
            Nueva Prestación
        </a>
    </div>
    <div class="col-md-12">
        <table class="table table-hover table-md-responsive table-bordered">
            <thead class="thead-light">
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Valor</th>
                <th colspan="2" class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($prestaciones as $prestacion)
                <tr>
                    <td>{{ $prestacion->presta_nombre }}</td>
                    <td>{{ $prestacion->presta_descripcion }}</td>
                    <td>${{ number_format($prestacion->presta_valor, 0) }}</td>
                    <td>
                        <a class="btn bg-gradient-secondary btn-sm" data-toggle="tooltip" data-placement="bottom"
                           title="Editar"
                           href="{{ route('prestacion.edit', $prestacion->id) }}"><i class="fas fa-pen"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $prestaciones->appends(['q' => $q])->links() }}
    </div>
@stop
