<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateClassworkSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classwork_siswa', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_classwork')->nullable()->index('id_classwork_index');
            $table->foreignId('id_siswa')->Nullable()->index('id_siswa_index');
            $table->date('tanggal');
            $table->string('file');
            $table->integer('nilai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classwork_siswa');
    }
}
