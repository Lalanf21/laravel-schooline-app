<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->softDeletes();
            $table->timestamps();
            $table->foreignId('id_jurusan')->nullable()->index('id_jurusan_index');
            $table->foreignId('id_kelas')->nullable()->index('id_kelas_index');
            $table->string('nisn',10);
            $table->string('nama',100);
            $table->date('tgl_lahir');
            $table->string('tahun_ajaran',10);
            $table->string('is_active', 1)->default('1');
            $table->string('foto')->default('foto/user.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
