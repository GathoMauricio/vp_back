<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_vouchers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ticket_id')->nullable();
            $table->bigInteger('provider_id')->nullable();
            $table->bigInteger('responsable_id')->nullable();
            $table->bigInteger('autoriza_id')->nullable();
            $table->bigInteger('recibe_id')->nullable();
            $table->bigInteger('concept_id')->nullable();
            $table->string('status')->nullable();
            $table->double('cantidad')->nullable();
            $table->string('motivo_visita')->nullable();
            $table->string('detalle')->nullable();
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
        Schema::dropIfExists('expense_vouchers');
    }
}
