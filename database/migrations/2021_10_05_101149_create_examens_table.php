<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examens', function (Blueprint $table) {
            $table->integer('crebo_nr');
            $table->string('examen')->unique('examen');
            $table->integer('plaatsen');
            $table->string('geplande_docenten')->index('examens_ibfk_3');
            
            $table->foreign('crebo_nr', 'examens_ibfk_1')->references('crebo_nr')->on('opleidingen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examens');
    }
}
