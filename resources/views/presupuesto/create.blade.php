@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-sx-12 col-sm-12 col-lg-8">
                <div class="card card-default">
                    <div class="card-header">Descripción Presupuesto</div>
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
                </div>
            </div>
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

