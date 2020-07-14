@extends('layouts.app')
    @section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 text-center">
              @if(env('APP_ENV') == 'local')
               <img src="{{ asset('images/licandent_logo.jpg') }}" class="brand-image img-circle elevation-3" style="opacity: .8; width: 120px">
              @else
               <img src="{{ secure_asset('images/licandent_logo.jpg') }}"  class="brand-image img-circle elevation-3" style="opacity: .8">
              @endif
              <h4 class="font-weight-bold pt-3">{{ Config::get('app.name') }}</h4>
                <p class="text-small ">Clinica Dental</p>
            </div>

            </div>
        <div class="row">
            <ul class="list-unstyled">
            <li class="text-left text-small">Luis Cruz Martinez 038, Licantén</li><br>
            <li class="text-left text-small">+56961758714/ +56999871416</li><br>
            <li class="text-small text-left">{{ env('APP_MAIL') }}</li>
            </ul>
        </div>
                <div class="row">
            <div class="col text-center">
                <h5 class="font-weight-bold">Presupuesto Nº {{ $presupuesto->id }}</h5>
                <div>
                    <h6 class="text-uppercase font-weight-bold">{{ $presupuesto->paciente->fullName() }}</h6>


                    <table class="table table-striped table-bordered pb-3" id="prestaciones">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Prestacion</th>
      <th scope="col">Valor</th>
    </tr>
  </thead>
  <tbody>
  @foreach($presupuesto->prestaciones as $prestacion)
    <tr>
    <td>{{ $prestacion->id }}</td>
      <td>{{ $prestacion->presta_nombre }} {{ 'DIENTE ' .$prestacion->pivot->pieza ?? '' }}</td>
      <td class="valor">${{ number_format($prestacion->presta_valor, 0) }}</td>
    </tr>
    @endforeach
    <tr>
        <th scope="col" colspan="2" class="text-left">TOTAL</th>
        <td class="total"></td>
    </tr>
  </tbody>
</table>
</div>
        <p>Profesional responsable: </p><p class="text-muted font-weight-bold">{{ \auth()->user()->fullName() }}</p>
                </div>
            </div>
    </div>
    @stop
