<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->foreign('id_jurusan', 'id_jurusan_fk_siswa')->references('id_jurusan')->on('jurusan')->onUpdate('CASCADE')->onDelete('RESTRICT');

            $table->foreign('id_kelas', 'id_kelas_fk_siswa')->references('id_kelas')->on('kelas')->onUpdate('CASCADE')->onDelete('RESTRICT');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropForeign('id_jurusan_fk_siswa');
            $table->dropForeign('id_kelas_fk_siswa');
        });
    }
}
