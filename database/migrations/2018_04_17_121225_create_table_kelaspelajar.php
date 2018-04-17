<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKelaspelajar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelaspelajar', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_kelas_pelajar');
            $table->integer('id_pengguna')->unique()->unsigned();
            $table->integer('id_kelas')->unique()->unsigned();
            $table->date('tanggal_mulai');
            $table->boolean('status');

            $table->foreign('id_pengguna')
                ->references('id_pengguna')
                ->on('pengguna');

            $table->foreign('id_kelas')
                ->references('id_kelas')
                ->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelaspelajar');
    }
}
