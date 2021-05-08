<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('id_absensi');
            $table->timestamps();
            $table->foreignId('id_ruang_belajar')->nullable()->index('id_ruang_belajar_index');
            $table->foreignId('id_siswa')->nullable()->index('id_siswa_index');
            $table->date('tanggal_absen');
            $table->enum('keterangan', ['alfa','sakit','ijin']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}
