<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapel', function (Blueprint $table) {
            $table->id('id_mapel');
            $table->timestamps();
            $table->foreignId('id_guru')->nullable()->index('id_guru_index')->unsigned();
            $table->foreignId('id_kelas')->nullable()->index('id_kelas_index')->unsigned();
            $table->string('is_active',1);
            $table->string('nama_mapel',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapel');
    }
}
