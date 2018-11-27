<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plan');
            $table->string('estudiantes')->nullable();
            $table->longText('presentacion')->nullable();
            $table->longText('historia')->nullable();
            $table->longText('pest')->nullable();
            $table->longText('porter')->nullable();
            $table->longText('cuatrop')->nullable();
            $table->longText('clientes')->nullable();
            $table->longText('competencia')->nullable();
            $table->longText('proveedores')->nullable();
            $table->longText('bcg')->nullable();
            $table->longText('dofa')->nullable();
            $table->longText('mefi')->nullable();
            $table->longText('ansoff')->nullable();
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
        Schema::dropIfExists('marketings');
    }
}
