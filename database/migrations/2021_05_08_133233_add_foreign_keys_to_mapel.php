<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMapel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mapel', function (Blueprint $table) {
            $table->foreign('id_kelas', 'id_kelas_fk_mapel')->references('id_kelas')->on('kelas')->onUpdate('CASCADE')->onDelete('RESTRICT');

            $table->foreign('id_guru', 'id_guru_fk_mapel')->references('id_guru')->on('guru')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mapel', function (Blueprint $table) {
            $table->dropForeign('id_kelas_fk_mapel');
            $table->dropForeign('id_guru_fk_mapel');
        });
    }
}
