<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas', function (Blueprint $table) {
            $table->id('id_tugas');
            $table->timestamps();
            $table->foreignId('id_ruang_belajar')->nullable()->index('id_ruang_belajar_index');
            $table->string('judul', 20);
            $table->date('deadline');
            $table->string('file');
            $table->date('tgl_publish');
            $table->string('is_publish');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugas');
    }
}
