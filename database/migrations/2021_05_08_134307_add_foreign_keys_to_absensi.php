<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAbsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absensi', function (Blueprint $table) {
            $table->foreign('id_siswa', 'id_siswa_index')->references('id_siswa')->on('siswa')->onUpdate('CASCADE')->onDelete('RESTRICT');

            $table->foreign('id_ruang_belajar', 'id_ruang_belajar_index')->references('id_ruang_belajar')->on('ruang_belajar')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absensi', function (Blueprint $table) {
            $table->dropForeign('id_siswa_index');
            $table->dropForeign('id_ruang_belajar_index');
        });
    }
}
