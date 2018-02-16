<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NinilaiUjian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_ujian', function (Blueprint $table) {
            $table->integer('nilai_id')->unsigned()->nullable();
            $table->foreign('nilai_id')->references('id')->on('nilai');
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
        Schema::dropIfExists('nilai_ujian');
    }
}
