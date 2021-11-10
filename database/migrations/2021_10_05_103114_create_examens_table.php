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
            $table->increments('id');
            $table->integer('crebo_nr');
            // $table->string('examen')->unique('examen');
            $table->string('uitleg')->nullable();
            $table->string('examen');
            $table->string('vak');
            $table->integer('plaatsen');
            $table->string('geplande_docenten');
            $table->date('examen_opgeven_begin');
            $table->date('examen_opgeven_eind');
            
            $table->foreign('crebo_nr', 'examens_ibfk_1')->references('crebo_nr')->on('opleidingen')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('geplande_docenten', 'examens_ibfk_3')->references('email')->on('users');
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
