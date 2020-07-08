@if($mensajes)
    <div class="col-sm-6 mb-2">
        <a class="btn bg-gradient-success btn-sm" title="Nuevo mensaje"
           href="{{ route('mensaje.create', $paciente->id) }}">
            <i class="fas fa-comment"></i>
            Nuevo Mensaje
        </a>
        @if (\Request::is('mensajes/*'))
            <a class="btn bg-gradient-secondary btn-sm" title="Regresar"
               href="{{ route('paciente.show', $paciente->id) }}">
                <i class="fas fa-arrow-alt-circle-left"></i>
                Atras
            </a>
        @endif
    </div>
    <hr>
    <div class="col pb-2">
        @foreach($mensajes as $mensaje)
            <div class="card card-outline card-dark">
                <div class="card-header">
                    <h6 class="card-title text-bold">
                        {{ $mensaje->titulo_mensaje }}
                    </h6>
                </div>
                <div class="card-body">
                    {{ $mensaje->cuerpo_mensaje }}
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-5">
                            Creado por:
                        </div>
                        <div class="col-sm-7 text-muted">
                            {{ auth()->user()->fullName()}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            el:
                        </div>
                        <div class="col-sm-7 text-muted">
                            {{ \Carbon\Carbon::parse($mensaje->fecha_mensaje)->isoFormat("D MMMM Y") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
