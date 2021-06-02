<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRuangBelajarSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ruang_belajar_siswa', function (Blueprint $table) {
            $table->foreign('id_ruang_belajar', 'id_fk_rbs')->references('id_ruang_belajar')->on('ruang_belajar')->onUpdate('CASCADE')->onDelete('CASCADE');
            
            $table->foreign('id_siswa', 'id_fk_siswa')->references('id_siswa')->on('siswa')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ruang_belajar_siswa', function (Blueprint $table) {
            $table->dropForeign('id_fk_rbs');
            $table->dropForeign('id_fk_siswa');
        });
    }
}
