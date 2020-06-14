<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('presup_descripcion');
            $table->string('presup_observacion')->nullable();
            $table->date('presup_expiracion');
            $table->double('presup_descuento')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('abono_id')->nullable();
            $table->unsignedBigInteger('paciente_id')->nullable();
        });


        Schema::table('presupuestos', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('abono_id')->references('id')->on('abonos')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onUpdate('cascade')->onDelete('set null');
          });

        DB::statement("ALTER TABLE presupuestos AUTO_INCREMENT = 5700000000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presupuestos');
    }
}
