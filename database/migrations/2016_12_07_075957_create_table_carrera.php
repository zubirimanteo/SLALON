<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCarrera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            
            $table->increments('id_carrera')->unsigned();
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->string('lugar');
            $table->string('categoria');
            $table->string('distancia');
            $table->string('avatar_carrera');
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
        Schema::drop('carreras');
    }
}
