<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeplandeExamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geplande_examen', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('student_nr');
            $table->integer('examen',false,true)->index();
            $table->string('faciliteiten_pas');
            $table->longText('bijzonderheden');
            $table->longText('opmerkingen');
            
            $table->foreign('examen', 'geplande_examen_ibfk_1')->references('id')->on('examen_moment')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geplande_examen');
    }
}
