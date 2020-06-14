@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-sx-12 col-sm-12 col-lg-8">
                <div class="card card-default">
                    <div class="card-header">Paciente</div>
                    <div class="card-body">
                        {{ Form::open(['action' => 'PresupuestoController@store', 'method' => 'POST', 'class' => 'form-horizontal']) }}
                        <div class="form-group row">
                            {!! Form::label('rut', 'Rut', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-5">
                                {!! Form::text('rut', null, ['class' => 'form-control form-control-sm'.($errors->has('rut') ? ' is-invalid' : ''), 'placeholder' =>
                                '00000000-X']) !!}
                                @if ($errors->has('rut'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('nombres', 'Nombres', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('nombres', null, ['class' => 'form-control form-control-sm'.($errors->has('nombres') ? ' is-invalid' : ''),
                            'placeholder' => 'Ingrese Nombres']) !!}
                                @if ($errors->has('nombres'))
                                    <span class="invalid-feedback">
                          <strong>{{ $errors->first('nombres') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('apellidos', 'Apellidos', ['class' => 'col-sm-3 col-form-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('apellido_paterno',null, ['class' => 'form-control form-control-sm'.($errors->has('apellido_paterno') ? '
                                is-invalid' : ''), 'placeholder' => 'Apellido Paterno']) !!}
                                @if ($errors->has('apellido_paterno'))
                                    <span class="invalid-feedback">
                          <strong>{{ $errors->first('apellido_paterno') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
