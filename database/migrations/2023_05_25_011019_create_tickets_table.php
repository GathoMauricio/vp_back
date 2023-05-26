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
            $table->string('tipo_equipo')->nullable();
            $table->string('marca_equipo')->nullable();
            $table->string('modelo_equipo')->nullable();
            $table->string('serie_equipo')->nullable();
            $table->string('password_equipo')->nullable();
            $table->string('disco_duro_equipo')->nullable();
            $table->string('capacidad_equipo')->nullable();
            $table->string('procesador_equipo')->nullable();
            $table->string('ram_equipo')->nullable();
            $table->string('so_equipo')->nullable();
            $table->string('office_equipo')->nullable();
            $table->string('antivirus_equipo')->nullable();
            $table->string('office_caducidad_equipo')->nullable();
            $table->string('antivirus_caducidad_equipo')->nullable();
            $table->string('software_equipo')->nullable();
            $table->integer('calificacion')->nullable();
            $table->string('firma_usuario_final')->nullable();
            $table->string('firma_encargado')->nullable();
            $table->string('firma_ing_servicio')->nullable();
            $table->string('pagado')->nullable();
            $table->string('motivo_cancelacion')->nullable();
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
