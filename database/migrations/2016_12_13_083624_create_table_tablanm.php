<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTablanm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tablanm', function (Blueprint $table) {
        
            $table->increments('id_nm')->unsigned();
            $table->integer('id_baliza')->unsigned();
            $table->foreign('id_baliza')
                  ->references('id_baliza')->on('balizas')
                  ->onDelete('cascade');
            $table->integer('id_descenso')->unsigned();
            $table->foreign('id_descenso')
                  ->references('id_descenso')->on('descensos')
                  ->onDelete('cascade'); 
            $table->string('dato_paso')->nullable;
            $table->string('dato_vibracion')->nullable;
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
        Schema::drop('tablanm');
    }
}
