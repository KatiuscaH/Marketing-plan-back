<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('publicidad');
            $table->string('caracteristicas');
            $table->string('ubicacion');
            $table->string('realizacion');
            $table->string('duracion');
            $table->string('numero');
            $table->string('costo');
            $table->integer('marketing_id');
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
        Schema::dropIfExists('medios');
    }
}
