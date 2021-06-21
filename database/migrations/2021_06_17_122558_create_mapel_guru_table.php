<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mapel_guru', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mapel')->nullable()->index('id_mapel_index');
            $table->foreignId('id_guru')->nullable()->index('id_guru_index');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mapel_guru');
    }
}
