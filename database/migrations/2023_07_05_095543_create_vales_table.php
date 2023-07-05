<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ticket_id')->comment('Referencia al ticket al que pertenece este vale');
            $table->string('descripcion')->nullable()->comment('Indica de que trata este vale');
            $table->double('cantidad_recibida', 2)->nullable()->comment('Cantidad que recibe el responsable de este vale');
            $table->string('responsable')->nullable()->comment('Responsable o encargado de este vale');
            $table->double('cantidad_regresada', 2)->nullable()->comment('Cantidad que regresa el encargado de este vale');
            $table->double('gasto_total', 2)->nullable()->comment('Cantidad que gasto en total el responsable d este vale');
            $table->string('autorizado_por')->nullable()->comment('Persona que autoriza este vale');
            $table->string('recibido_por')->nullable()->comment('Persona que recibe este vale');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vales');
    }
}
