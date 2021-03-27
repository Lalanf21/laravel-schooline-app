<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id('id_guru');
            $table->softDeletes();
            $table->timestamps();
            $table->string('nip',10);
            $table->string('nama');
            $table->string('no_hp',12);
            $table->string('nama_mapel',50);
            $table->string('password');
            $table->string('is_active',1);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guru');
    }
}
