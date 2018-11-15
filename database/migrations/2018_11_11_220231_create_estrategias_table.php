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
<<<<<<< HEAD
            $table->string('nombre');
            $table->integer('precio');
            $table->string('estado');
            $table->integer('tiempo');
            $table->integer('objetivo_id')->unsigned()->nullable($value = false);
=======
            $table->string('nombre')->nullable()->change();
            $table->string('responsable');
            $table->string('fecha');
            $table->string('presupuesto');
            $table->string('objetivo_id')->unsigned()->nullable()->change();
            $table->string('indicador_logro');
>>>>>>> 3d0801f0b6886ed05cbd3c3ad00094e1b2fa8255
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
