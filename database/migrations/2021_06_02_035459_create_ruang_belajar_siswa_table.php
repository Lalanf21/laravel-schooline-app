<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuangBelajarSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruang_belajar_siswa', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_ruang_belajar')->nullable()->index('id_ruang_belajar_index');
            $table->foreignId('id_siswa')->nullable()->index('id_siswa_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruang_belajar_siswa');
    }
}
