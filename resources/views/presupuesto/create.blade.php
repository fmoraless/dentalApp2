@extends('layouts.master')

@section('content')

    <div class="card">
        <div class="card-header">
            Presupuesto
        </div>

        <div class="card-body">
            <form action="{{ route("presupuesto.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('presup_descripcion') ? 'has-error' : '' }}">
                    <label for="">Paciente</label>
                    <select name="paciente_id" class="form-control" id="select-paciente">
                        <option value="">-- choose paciente --</option>
                            @foreach ($pacientes as $paciente)
                                 <option value="{{ $paciente->id }}">
                                 {{ $paciente->fullName() }} - {{ $paciente->rut }}
                                 </option>
                                 @endforeach
                     </select>
                    <!-- <input type="text" id="presup_descripcion" name="presup_descripcion" class="form-control" value="{{ old('presup_descripcion', isset($presupuesto) ? $presupuesto->presup_descripcion : '') }}" required> -->
                    <!-- @if($errors->has('presup_descripcion'))
                        <em class="invalid-feedback">
                            {{ $errors->first('presup_descripcion') }}
                        </em>
                    @endif -->
                    <p class="helper-block">
                    </p>
                </div>
                <div class="form-group {{ $errors->has('customer_email') ? 'has-error' : '' }}">
                    <label for="customer_email">Descripcion</label>
                    <input type="text" id="presup_descripcion" name="presup_descripcion" class="form-control" value="{{ old('presup_descripcion', isset($presupuesto) ? $presupuesto->presup_descripcion : '') }}" required>
                    @if($errors->has('presup_descripcion'))
                        <em class="invalid-feedback">
                            {{ $errors->first('presup_descripcion') }}
                        </em>
                    @endif
                    <p class="helper-block">
                    </p>
                </div>

                <div class="card">
                    <div class="card-header">
                        Prestaciones
                    </div>

                    <div class="card-body">
                        <table class="table" id="prestaciones_table">
                            <thead>
                            <tr>
                                <th>Prestacion</th>
                                <th>Cantidad</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (old('prestaciones', ['']) as $index => $oldPrestacion)
                                <tr id="prestacion{{ $index }}">
                                    <td>
                                        <select name="prestaciones[]" class="form-control" id="select-prestacion">
                                            <option value="">-- choose prestacion --</option>
                                            @foreach ($prestaciones as $prestacion)
                                                <option value="{{ $prestacion->id }}"{{ $oldPrestacion == $prestacion->id ? ' selected' : '' }}>
                                                    {{ $prestacion->presta_nombre }} (${{ number_format($prestacion->presta_valor, 0) }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="cantidades[]" class="form-control" value="{{ old('cantidades.' . $index) ?? '1' }}" />
                                    </td>
                                </tr>
                            @endforeach
                            <tr id="prestacion{{ count(old('prestaciones', [''])) }}"></tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-12">
                                <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                                <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <input class="btn btn-info" type="submit" value="Crear Presupuesto">
                </div>
            </form>


        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#select-paciente').select2();
        });
        $(document).ready(function() {
            let row_number = {{ count(old('prestaciones', [''])) }};
            $("#add_row").click(function (e) {
                e.preventDefault();
                let new_row_number = row_number - 1;
                $('#prestacion' + row_number).html($('#prestacion' + new_row_number).html()).find('td:first-child');
                $('#prestaciones_table').append('<tr id="prestacion' + (row_number + 1) + '"></tr>');
                row_number++;
            });
            $("#delete_row").click(function (e) {
                e.preventDefault();
                if (row_number > 1) {
                    $("#prestacion" + (row_number - 1)).html('');
                    row_number--;
                }
            })
        });
    </script>
@endsection

