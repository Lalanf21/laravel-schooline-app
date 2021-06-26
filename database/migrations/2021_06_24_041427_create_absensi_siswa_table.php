<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_siswa', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_absensi')->index('id_absensi_index');
            $table->foreignId('id_siswa')->index('id_siswa_index');
            $table->string('file')->nullable();
            $table->enum('keterangan', ['alfa', 'sakit','ijin', 'hadir']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi_siswa');
    }
}
