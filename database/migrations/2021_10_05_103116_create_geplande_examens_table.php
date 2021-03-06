<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeplandeExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geplande_examens', function (Blueprint $table) {
            $table->id();
            $table->string('voornaam');
            $table->string('achternaam');
            $table->string('faciliteitenpas');
            $table->string('studentnummer');
            $table->string('klas');
            $table->integer('opleiding_id')->unsigned(); //Relatie naar cerbo_nr -> opleiding
            $table->integer('examen')->unsigned(); //Relatie naar examens id -> examen, vak, 
            $table->integer('examen_moment')->unsigned(); //Relatie naar examen moment
            $table->integer('std_bevestigd')->default('0');
            $table->integer('doc_bevestigd')->default('0');

            $table->foreign('opleiding_id')->references('id')->on('opleidingen');
            $table->foreign('examen')->references('id')->on('examens');
            $table->foreign('examen_moment')->references('id')->on('examen_moment');
        });
    }

    //$table->foreign('user_id')->references('id')->on('users');

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geplande_examen');
        Schema::dropIfExists('geplande_examen');
    }
}
