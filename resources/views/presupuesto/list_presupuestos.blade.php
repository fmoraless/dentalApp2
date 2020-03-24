@if($presupuestos)
    <div class="col-sm-6 mb-2">
        <a class="btn bg-gradient-success btn-sm" title="Nuevo presupuesto"
           href="{{ route('presupuesto.create', $paciente->id) }}">
            <i class="fas fa-money-check-alt"></i>
            Nuevo Presupuesto
        </a>
    </div>
    <hr>
    <div class="col pb-2">
        @foreach($presupuestos as $presupuesto)
            <div class="card card-outline card-dark">
                <div class="card-header">
                    <h6 class="card-title text-bold">
                        {{ $presupuesto->presup_descripcion }}
                    </h6>
                </div>
                <div class="card-body">
                    {{ $presupuesto->presup_observacion ?? '' }}
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-5">
                            fecha:
                        </div>
                        <div class="col-sm-7 text-muted">
                            {{ \Carbon\Carbon::parse($presupuesto->created_at)->isoFormat("D MMMM Y") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
