    @extends('layouts.master')
    @section('content')    
    <div class="container">
        <div class="row">
            <div class="col-sm-2 text-center">
              @if(env('APP_ENV') == 'local')
               <img src="{{ asset('images/licandent_logo.jpg') }}" class="brand-image img-circle elevation-3" style="opacity: .8; width: 120px">
              @else
               <img src="{{ secure_asset('images/licandent_logo.jpg') }}"  class="brand-image img-circle elevation-3" style="opacity: .8">
              @endif
              <h6 class="font-weight-bold pt-3">{{ Config::get('app.name') }}</h6>
            </div>
                      
            </div>
                <div class="row">
            <div class="col text-center">
                <h5 class="font-weight-bold">Presupuesto Nº {{ $presupuesto->id }}</h5>
                <div>
                    <h6 class="text-uppercase font-weight-bold">{{ $presupuesto->paciente->fullName() }}</h6>
                    
                    
                    <table class="table table-striped table-bordered pb-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Prestacion</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Valor</th>
    </tr>
  </thead>
  <tbody>
  @foreach($presupuesto->prestaciones as $prestacion)
    <tr>
    <td>{{ $prestacion->id }}</td>
      <td>{{ $prestacion->presta_nombre }}</td>
      <td>{{ $prestacion->presta_descripcion }}</td>
      <td>${{ number_format($prestacion->presta_valor, 0) }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
        <p>Profesional responsable: </p><p class="text-muted font-weight-bold">{{ \auth()->user()->fullName() }}</p>            
                </div>
            </div>
    </div>
    @stop