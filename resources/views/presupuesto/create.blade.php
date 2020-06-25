@extends('layouts.master')
@section('content')
<div class="card card-primary">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-notes-medical"></i>
                            Detalle de prestaciones
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Buscador Prestaciones</label>
                            <div class="input-group input-group">
                                <input id="prestaciones" type="text" class="form-control" placeholder="Ingrese una prestación" autocomplete="off">
                                <span class="input-group-append">
                                <button type="button" class="btn btn-danger btn-flat">
                                    <i class="fas fa-times"></i>
                                </button>
                            </span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-hover table-md-responsive table-bordered" id="data">
                        <thead>
                            <tr>
                                <th>Eliminar</th>
                                <th>Prestacion</th>
                                <th>Estado</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <!-- /.table -->
                </div>
            </div>
            <!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-file-medical"></i>
                            Detalle de presupuesto
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Fecha de creación</label>
                            <input type="text" class="form-control" placeholder="Ingrese una prestación" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label>Paciente</label>
                            <select class="form-control">
                                <option>Cliente 1</option>
                                <option>Cliente 2</option>
                                <option>Cliente 3</option>
                                <option>Cliente 4</option>
                                <option>Cliente 5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Sub total</label>
                            <input type="number" class="form-control" placeholder="0,00" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="">IVA%</label>
                            <input type="number" class="form-control" placeholder="0,00" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="">Total</label>
                            <input type="number" class="form-control" placeholder="0,00" autocomplete="off">
                        </div>
                    </div>
                    <hr>

                    <!-- /.table -->
                </div>
            </div>
            <!-- /.col-lg-4 -->
        </div>
    </div>
    <!-- /.card body -->
    <div class="card-footer">
        <a class="btn btn-success btn-flat btn-Test">
            <i class="fas fa-save"></i>
            Nuevo presupuesto
        </a>
    </div>
</div>
<script>
/*    $(function() {
        $('#prestaciones').select2({
            theme:"boostrap4"
        });
    });*/
$(function() {
    $('#prestaciones').select2({
        ajax: {
            theme: "boostrap4",
            url: "{{ route('seleccione.prestacion') }}",
            dataType: 'json'
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        }
    });
});
</script>
@stop

