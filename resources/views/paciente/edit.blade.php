@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-sx-12 col-sm-12 col-lg-8">
                <div class="card card-default">
                    <div class="card-header">Editando Paciente</div>
                    <div class="card-body">
                        @include('paciente.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
