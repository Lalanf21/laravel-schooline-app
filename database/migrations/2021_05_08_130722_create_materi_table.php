<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->id('id_materi');
            $table->timestamps();
            $table->foreignId('id_ruang_belajar')->nullable()->index('id_ruang_belajar_index');
            $table->string('judul', 50);
            $table->text('konten');
            $table->string('file');
            $table->date('tanggal');
            $table->string('is_publish',1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi');
    }
}
