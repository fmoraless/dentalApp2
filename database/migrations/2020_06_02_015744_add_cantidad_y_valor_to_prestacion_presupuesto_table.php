<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCantidadYValorToPrestacionPresupuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prestacion_presupuesto', function (Blueprint $table) {
            $table->double('presta_valor');
            $table->unsignedTinyInteger('cantidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prestacion_presupuesto', function (Blueprint $table) {
            //
        });
    }
}
