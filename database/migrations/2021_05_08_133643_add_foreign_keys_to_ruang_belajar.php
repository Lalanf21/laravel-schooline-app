<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToRuangBelajar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ruang_belajar', function (Blueprint $table) {
            $table->foreign('id_mapel', 'id_mapel_index')->references('id_mapel')->on('mapel')->onUpdate('CASCADE')->onDelete('RESTRICT');

            $table->foreign('id_kelas', 'id_kelas_index')->references('id_kelas')->on('kelas')->onUpdate('CASCADE')->onDelete('RESTRICT');

            $table->foreign('id_guru', 'id_guru_index')->references('id_guru')->on('guru')->onUpdate('CASCADE')->onDelete('RESTRICT');

            $table->foreign('id_siswa', 'id_siswa_index')->references('id_siswa')->on('siswa')->onUpdate('CASCADE')->onDelete('RESTRICT');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ruang_belajar', function (Blueprint $table) {
            $table->dropForeign('id_siswa_index');
            $table->dropForeign('id_guru_index');
            $table->dropForeign('id_mapel_index');
            $table->dropForeign('id_kelas_index');
        });
    }
}
