@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-sx-12 col-sm-12 col-lg-8">
                <div class="card card-default">
                    <div class="card-header">Editando Prestación</div>
                    <div class="card-body">
                        {{ Form::open(['action' => route('prestacion.update', $prestacion->id), 'method' => 'PUT', 'url' => 'prestacion/'.$prestacion->id, 'class' => 'form-horizontal']) }}
                        <div class="form-group row">
                            {!! Form::label('presta_nombre', 'Nombres', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-6">
                                {!! Form::text('presta_nombre', $prestacion->presta_nombre, ['class' => 'form-control
                                form-control-sm'.($errors->has('presta_nombre') ? '
                                is-invalid' : ''),
                                'placeholder' => 'Ingrese Nombre']) !!}
                                @if ($errors->has('presta_nombre'))
                                    <span class="invalid-feedback">
                                <strong>{{ $errors->first('presta_nombre') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('presta_descripcion', 'Descripcion', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::textarea('presta_descripcion',$prestacion->presta_descripcion, ['class' => 'form-control
                                form-control-sm'.($errors->has('presta_descripcion') ? '
                                is-invalid' : ''), 'placeholder' => 'Descripcion']) !!}
                                @if ($errors->has('presta_descripcion'))
                                    <span class="invalid-feedback">
                                <strong>{{ $errors->first('presta_descripcion') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                            <div class="form-group row">
                                {!! Form::label('presta_descripcion', 'Descripcion', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-5">
                                    {!! Form::text('presta_valor',$prestacion->presta_valor, ['class' => 'form-control
                                    form-control-sm'.($errors->has('presta_valor') ? '
                                    is-invalid' : ''), 'placeholder' => 'Ingrese un valor']) !!}
                                    @if ($errors->has('presta_valor'))
                                        <span class="invalid-feedback">
                                <strong>{{ $errors->first('presta_valor') }}</strong>
                            </span>
                                    @endif
                                </div>
                            </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                {{ Form::submit('Guardar', ['class' => 'btn bg-gradient-primary btn-sm btn-block']) }}
                            </div>
                            <div class="col">
                                <a href="{{ route('prestacion.index') }}" style="text-decoration:none">
                                    {{ Form::button('Cancelar', ['class' => 'btn bg-gradient-secondary btn-sm btn-block'] ) }}
                                </a>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop