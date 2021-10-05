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
            $table->integer('id')->primary();
            $table->integer('examenid');
            $table->string('datum');
            $table->string('tijd');
            
            $table->foreign('examenid', 'examen_moment_ibfk_1')->references('crebo_nr')->on('examens');
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
