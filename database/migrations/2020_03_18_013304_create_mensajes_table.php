<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo_mensaje');
            $table->longText('cuerpo_mensaje');
            $table->date('fecha_mensaje');
            $table->text('creador_mensaje');
            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->timestamps();
        });

        Schema::table('mensajes', function (Blueprint $table){
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mensajes');
    }
}
