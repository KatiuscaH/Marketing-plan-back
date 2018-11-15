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
            $table->json('estudiantes')->nullable();
            $table->text('presentacion')->nullable();
            $table->text('historia')->nullable();
            $table->text('pest')->nullable();
            $table->text('porter')->nullable();
            $table->text('cuatrop')->nullable();
            $table->text('clientes')->nullable();
            $table->text('competencia')->nullable();
            $table->text('proveedores')->nullable();
            $table->text('bcg')->nullable();
            $table->text('dofa')->nullable();
            $table->text('mefi')->nullable();
            $table->text('ansoff')->nullable();
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
