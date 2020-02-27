<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('abono_descripcion');
            $table->double('abono_valor');
            $table->timestamps();

            $table->unsignedBigInteger('medio_id')->nullable();
        });

        Schema::table('abonos', function (Blueprint $table) {
            $table->foreign('medio_id')->references('id')->on('medios')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonos');
    }
}
