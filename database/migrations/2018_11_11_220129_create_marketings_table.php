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
            $table->longText('presentacion');
            $table->longText('historia');
            $table->longText('pest');
            $table->longText('porter');
            $table->longText('cuatrop');
            $table->longText('clientes');
            $table->longText('competencia');
            $table->longText('proveedores');
            $table->longText('bcg');
            $table->longText('dofa');
            $table->longText('mefi');
            $table->longText('ansoff');
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
