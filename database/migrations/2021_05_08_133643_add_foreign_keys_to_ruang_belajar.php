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
            $table->foreign('id_mapel', 'id_mapel_fk_rb')->references('id_mapel')->on('mapel')->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->foreign('id_guru', 'id_guru_fk_rb')->references('id_guru')->on('guru')->onUpdate('CASCADE')->onDelete('CASCADE');
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
            $table->dropForeign('id_mapel_fk_rb');
            $table->dropForeign('id_guru_fk_rb');
        });
    }
}
