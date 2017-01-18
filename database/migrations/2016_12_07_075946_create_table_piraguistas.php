<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePiraguistas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piraguistas', function (Blueprint $table) {
            
            $table->increments('id_piraguista')->unsigned();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('apellido2');
            $table->string('genero');
            $table->string('club');
            $table->string('nacionalidad');
            $table->integer('dorsal');
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
        Schema::drop('piraguistas');
    }
}
