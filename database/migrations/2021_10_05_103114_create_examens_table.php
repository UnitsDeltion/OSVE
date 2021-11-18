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
            $table->integer('opleiding_id',false,true)->index();
            $table->string('uitleg')->nullable();
            $table->string('examen');
            $table->string('vak');
            $table->string('geplande_docenten');
            $table->date('examen_opgeven_begin');
            $table->date('examen_opgeven_eind');
            
            $table->foreign('opleiding_id', 'examens_ibfk_1')->references('id')->on('opleidingen')->onDelete('cascade')->onUpdate('restrict');
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
