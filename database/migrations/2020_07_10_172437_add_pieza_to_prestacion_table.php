<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPiezaToPrestacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prestacions', function (Blueprint $table) {
            $table->unsignedBigInteger('pieza_id')->nullable()->after('presta_valor');
            $table->foreign('pieza_id')->references('id')->on('piezas')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prestacions', function (Blueprint $table) {
            //
        });
    }
}
