<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamenMomentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examen_moment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('examenid',false,true)->index();
            $table->date('datum');
            $table->time('tijd');
            
            $table->foreign('examenid', 'examen_moment_ibfk_1')->references('id')->on('examens')->onDelete('cascade')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examen_moment');
    }
}
