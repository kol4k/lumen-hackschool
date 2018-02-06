<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('biodata_id')->unsigned()->nullable();
            $table->foreign('biodata_id')->references('id')->on('biodatas');
            $table->string('email',90)->unique();
            $table->string('nis',90)->unique();
            $table->string('password',251);
            $table->string('avatar',251)->nullable();
            $table->string('jabatan')->enum(['Administrator', 'Guru', 'Siswa']);
            $table->string('token_api',251)->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
