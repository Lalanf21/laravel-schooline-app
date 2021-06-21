<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClasswork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classwork', function (Blueprint $table) {
            $table->foreign('id_ruang_belajar', 'id_fk_rbc')->references('id_ruang_belajar')->on('ruang_belajar')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classwork', function (Blueprint $table) {
            $table->dropForeign('id_fk_rbc');
        });
    }
}
