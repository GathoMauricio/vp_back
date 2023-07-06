<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vale_id')->comment('Referencia al vale al que pertenece este gasto');
            $table->text('proveedor')->nullable()->comment('Proveedor del gasto en caso de que el concepto sea un producto');
            $table->text('proveedor_otro')->nullable()->comment('Campo abierto en caso de seleccionar otro proveedor que no exista en el catálogo');
            $table->text('concepto')->nullable()->comment('Especifica el tipo de gasto que se hará');
            $table->text('concepto_otro')->nullable()->comment('Campo abierto en caso de seleccionar otro concepto que no exista en el catálogo');
            $table->double('costo', 2)->nullable()->comment('Cantidad que se pretende gastar');
            $table->text('detalle')->nullable()->comment('Información extra sobre este gasto');
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
        Schema::dropIfExists('gastos');
    }
}
