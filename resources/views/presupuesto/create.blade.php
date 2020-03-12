@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-sx-12 col-sm-12 col-lg-8">
                <div class="card card-default">
                    <div class="card-header">Descripción Prestación</div>
                    <div class="card-body">
                        @include('prestacion.form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
