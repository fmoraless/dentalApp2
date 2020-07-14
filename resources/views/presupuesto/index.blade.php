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
        <a class="btn bg-gradient-success btn-sm" title="Nuevo Presupuesto" href="{{ route('presupuesto.create') }}">
            <i class="fas fa-user-plus">

            </i>
            Presupuesto
        </a>
    </div>
    <div class="col-md-12">
        <table class="table table-hover table-md-responsive table-bordered">
            <thead class="thead-light">
            <tr>
                <th>Numero Presupuesto</th>
                <th>Status</th>
                <th>Fecha</th>
                <th>Total</th>
                <th colspan="2" class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>

            @foreach($presupuestos ?? '' as $presupuesto)

                <tr>
                    <td>
                        <a href="{{ route('presupuesto.show', $presupuesto->id) }}">{{ $presupuesto->id }}</a>
                    </td>
                    <td>{{ $presupuesto->status }}</td>
                    <td>{{ $presupuesto->created_at }}</td>
                    <td>{{ $presupuesto->total }}</td>
                    <td>
                        <a class="btn bg-gradient-secondary btn-sm" data-toggle="tooltip" data-placement="bottom"
                           title="Editar"
                           href="{{ route('presupuesto.edit', $presupuesto->id) }}"><i class="fas fa-pen"></i>
                        </a>
                        <a class="btn bg-gradient-secondary btn-sm" data-toggle="tooltip" data-placement="bottom"
                           title="Pdf"
                           href="{{ route('presupuesto.getpdf', $presupuesto->id) }}" target="_blank"><i class="fa fa-file-pdf" aria-hidden="true"></i>
                        </a>
                    </>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $presupuestos->links() !!}
    </div>
@stop
