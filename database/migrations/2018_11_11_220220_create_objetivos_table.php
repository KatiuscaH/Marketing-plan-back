<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjetivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetivos', function (Blueprint $table) {
            $table->increments('id');
<<<<<<< HEAD
            $table->string('nombre')->nullable($value = false);
            $table->integer('marketing_id')->unsigned()->nullable($value = false);
=======
            $table->string('nombre')->nullable()->change();
            $table->integer('marketing_id')->unsigned()->nullable()->change();
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
        Schema::dropIfExists('objetivos');
    }
}
