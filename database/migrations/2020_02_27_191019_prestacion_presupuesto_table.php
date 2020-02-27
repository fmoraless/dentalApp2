<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrestacionPresupuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestacion_presupuesto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('prestacion_id')->nullable();
            $table->unsignedBigInteger('presupuesto_id')->nullable();
            $table->timestamps();
        });

        Schema::table('prestacion_presupuesto', function (Blueprint $table) {
            $table->foreign('prestacion_id')->references('id')->on('prestacions');
            $table->foreign('presupuesto_id')->references('id')->on('presupuestos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
