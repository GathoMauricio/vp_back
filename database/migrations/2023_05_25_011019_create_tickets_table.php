<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usuario_id')->nullable();
            $table->bigInteger('author_id')->nullable();
            $table->bigInteger('coordinador_id')->nullable();
            $table->bigInteger('status_id')->nullable();
            $table->bigInteger('clase_id')->nullable();
            $table->string('folio')->nullable();
            $table->timestamp('inicio')->nullable();
            $table->timestamp('cierre')->nullable();
            $table->string('prioridad')->nullable();
            $table->string('problematica')->nullable();
            $table->string('comentarios_usuario')->nullable();
            $table->string('comentarios_cliente')->nullable();
            $table->integer('calificacion')->nullable();
            $table->string('firma_usuario_final')->nullable();
            $table->string('firma_encargado')->nullable();
            $table->string('firma_ing_servicio')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
