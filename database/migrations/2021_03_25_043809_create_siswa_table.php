<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->softDeletes();
            $table->timestamps();
            $table->string('nisn',12);
            $table->string('nama');
            $table->date('tgl_lahir');
            $table->integer('kelas');
            $table->string('tahun_ajaran',10);
            $table->string('password');
            $table->string('is_active', 1)->default('1');
            $table->string('foto');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
