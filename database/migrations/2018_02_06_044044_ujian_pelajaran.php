<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UjianPelajaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian_pelajaran', function (Blueprint $table) {
            $table->integer('pelajaran_id')->unsigned()->nullable();
            $table->foreign('pelajaran_id')->references('id')->on('pelajaran');
            $table->integer('ujian_id')->unsigned()->nullable();
            $table->foreign('ujian_id')->references('id')->on('ujian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ujian_pelajaran');
    }
}
