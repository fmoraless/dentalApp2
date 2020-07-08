@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-users-cog"></i>
                            Paciente
                        </h3>
                    </div>
                    <div class="card-body">
                        <h4>{{ $paciente->fullName() }}</h4>
                        <div class="row">
                            <div class="col-5 col-sm-3">
                                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                     aria-orientation="vertical">
                                    <a class="nav-link active" id="vert-tabs-mensajes-tab" data-toggle="pill"
                                       href="#vert-tabs-mensajes" role="tab" aria-controls="vert-tabs-mensajes"
                                       aria-selected="true">Ultimo Mensaje</a>
                                    <a class="nav-link" id="vert-tabs-presupuestos-tab" data-toggle="pill"
                                       href="#vert-tabs-presupuestos" role="tab" aria-controls="vert-tabs-presupuestos"
                                       aria-selected="false">Presupuestos</a>
                                    {{--<a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill"
                                       href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages"
                                       aria-selected="false">Messages</a>
                                    <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill"
                                       href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
                                       aria-selected="false">Settings</a>--}}
                                </div>
                            </div>
                            <div class="col col-sm-9">
                                <div class="tab-content" id="vert-tabs-tabContent">
                                    <div class="tab-pane text-left fade show active" id="vert-tabs-mensajes"
                                         role="tabpanel"
                                         aria-labelledby="vert-tabs-mensajes-tab">

                                        @include('mensaje.list_mensajes', $paciente)
                                        @if($paciente->mensajes->count() > 0)
                                            <a href="{{ route('mensajes', $paciente->id) }}"><span
                                                    class="text-bold">Ver Todos los mensajes...</span></a>
                                        @else
                                            <p class="text-muted">No hay Mensajes aun, crea uno <i
                                                    class="far fa-laugh-wink fa-2x"></i></p>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-presupuestos" role="tabpanel"
                                         aria-labelledby="vert-tabs-presupuestos-tab">

{{--                                        @include('presupuesto.list_presupuestos', $paciente)--}}
                                        @if($paciente->presupuestos->count() > 0)
                                            <a href="{{ route('presupuesto.index') }}"><span
                                                    class="text-bold">Ver Todos los presupuestos...</span></a>
                                        @else
                                            <p class="text-muted">No hay Presupuestos aun, crea uno <i
                                                    class="far fa-smile-beam fa-2x"></i></p>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel"
                                         aria-labelledby="vert-tabs-messages-tab">
                                        Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris.
                                        Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu
                                        massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla.
                                        Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit
                                        condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis
                                        velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum
                                        odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla
                                        lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id
                                        fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt
                                        eleifend ac ornare magna.
                                    </div>
                                    <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel"
                                         aria-labelledby="vert-tabs-settings-tab">
                                        Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna,
                                        iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit
                                        dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie
                                        tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec
                                        interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget
                                        aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo
                                        dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan
                                        ex sit amet facilisis.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
