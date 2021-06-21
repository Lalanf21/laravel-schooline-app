<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuangBelajarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruang_belajar', function (Blueprint $table) {
            $table->id('id_ruang_belajar');
            $table->timestamps();
            $table->foreignId('id_mapel')->index('id_mapel_index');
            $table->foreignId('id_guru')->index('id_guru_index');
            $table->string('nama', 20);
            $table->string('kode', 6);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruang_belajar');
    }
}
