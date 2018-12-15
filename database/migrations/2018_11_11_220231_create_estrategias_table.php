<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstrategiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estrategias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tactica')->nullable();
            $table->string('responsable');
            $table->string('fecha');
            $table->string('presupuesto');
            $table->integer('objetivo_id')->unsigned()->nullable();
            $table->string('indicador_logro');
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
        Schema::dropIfExists('estrategias');
    }
}
