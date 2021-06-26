<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classwork', function (Blueprint $table) {
            $table->id('id_classwork');
            $table->timestamps();
            $table->foreignId('id_ruang_belajar')->index('id_ruang_belajar_index');
            $table->enum('jenis',['tugas','materi']);
            $table->string('judul','30');
            $table->text('deskripsi');
            $table->date('deadline')->nullable();
            $table->string('file');
            $table->date('tanggal');
            $table->string('is_publish', 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classwork');
    }
}
