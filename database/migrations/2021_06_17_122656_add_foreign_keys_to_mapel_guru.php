<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMapelGuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mapel_guru', function (Blueprint $table) {
            $table->foreign('id_mapel', 'id_fk_mapelg')->references('id_mapel')->on('mapel')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_guru', 'id_fk_gurug')->references('id_guru')->on('guru')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mapel_guru', function (Blueprint $table) {
            $table->dropForeign('id_fk_mapelg');
            $table->dropForeign('id_fk_gurug');
        });
    }
}
