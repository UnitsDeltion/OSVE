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
            $table->string('examen')->primary('examen');
            $table->integer('plaatsen');
            $table->string('geplande_docenten');
            
            $table->foreign('crebo_nr', 'examens_ibfk_1')->references('crebo_nr')->on('opleidingen')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('geplande_docenten', 'examens_ibfk_3')->references('email')->on('users');
        });

        Schema::create('soort_examen', function (Blueprint $table){
            $table->increments('id');
            $table->string('examen_naam');
            $table->string('soort_examen');

            $table->foreign('examen_naam')
                ->references('examen')
                ->on('examens')
                ->onDelete('cascade');
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
