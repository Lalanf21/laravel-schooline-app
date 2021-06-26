<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAbsensiSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absensi_siswa', function (Blueprint $table) {
            $table->foreign('id_absensi', 'id_absensi_fk_absensi_siswa')->references('id_absensi')->on('absensi')->onUpdate('RESTRICT')->onDelete('RESTRICT');

            $table->foreign('id_siswa', 'id_siswa_fk_absensi_siswa')->references('id_siswa')->on('siswa')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absensi_siswa', function (Blueprint $table) {
            $table->dropForeign('id_absensi_fk_absensi_siswa');
            $table->dropForeign('id_siswa_fk_absensi_siswa');
        });
    }
}
