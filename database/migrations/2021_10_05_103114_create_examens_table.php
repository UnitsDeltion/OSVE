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
            $table->integer('id')->primary('id');
            $table->integer('crebo_nr');
            $table->string('examen')->unique('examen');
            $table->string('vak');
            $table->integer('plaatsen');
            $table->string('geplande_docenten');
            $table->string('examen_type')->nullable();
            $table->string('examen_opgeven_begin');
            $table->string('examen_opgeven_eind');
            $table->string('uitleg')->nullable();
            $table->string('schrijf_examen')->nullable();
            $table->string('lees_examen')->nullable();
            $table->string('spreek_examen')->nullable();
            
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
