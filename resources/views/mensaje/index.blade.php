@extends('layouts.master')
@section('content')
    <div class="col-md-12">

        {{--        success alert al crear--}}

        <div class="page-header">
            <div class="form-group">
                {!! Form::open(['route' => 'mensaje.index', 'method' => 'GET', 'class' => 'form-inline float-right pb-2'])
                !!}
                {{ Form::text('q', null, ['class' => 'form-control mx-1', 'placeholder' => 'Buscar'], isset($q) ? $q : '') }}
                <button type="submit" class="btn btn-secondary form-control"><span><i
                            class="fas fa-search"></i></span></button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        @if($mensajes->has('paciente'))

            <div class="col-sm-6">
                <a class="btn bg-gradient-success btn-sm" title="Nuevo mensaje" href="{{ route('mensaje.create') }}">
                    <i class="fas fa-user-plus">

                    </i>
                    Nuevo Mensaje
                </a>
            </div>

            @foreach($mensajes as $mensaje)
                <div class="col-sm-6 pb-2">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">
                                {{ $mensaje->titulo_mensaje }}
                            </h6>
                        </div>
                        <div class="card-body">
                            {{ $mensaje->cuerpo_mensaje }}
                        </div>
                        <div class="card-footer">
                            {{ $mensaje->creador_mensaje }}
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-muted">NO hay mensaje aun</p>
            <a href="{{ route('mensaje.create') }}" class="btn bg-gradient-green btn-sm"><i
                    class="fas fa-comment-alt"></i>
                Nuevo Comentario
            </a>
        @endif
    </div>
@stop
