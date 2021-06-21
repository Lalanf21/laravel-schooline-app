<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClassworkSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('classwork_siswa', function (Blueprint $table) {
            $table->foreign('id_classwork', 'id_fk_classwork')->references('id_classwork')->on('classwork')->onUpdate('CASCADE')->onDelete('CASCADE');

            $table->foreign('id_siswa', 'id_fk_cls')->references('id_siswa')->on('siswa')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classwork_siswa', function (Blueprint $table) {
            $table->dropForeign('id_fk_cls');
            $table->dropForeign('id_fk_classwork');
        });
    }
}
