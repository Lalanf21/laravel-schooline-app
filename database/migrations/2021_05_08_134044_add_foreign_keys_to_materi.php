<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMateri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('materi', function (Blueprint $table) {
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
        Schema::table('materi', function (Blueprint $table) {
            $table->dropForeign('id_ruang_belajar_index');
        });
    }
}
