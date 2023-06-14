<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->biginteger('sepomex_id')->nullable();
            $table->string('num_int')->nullable();
            $table->string('num_ext')->nullable();
            $table->string('cp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('sepomex_id');
            $table->dropColumn('num_int');
            $table->dropColumn('num_ext');
            $table->dropColumn('cp');
        });
    }
}
