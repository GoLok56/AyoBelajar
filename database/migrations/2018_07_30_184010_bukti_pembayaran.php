<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuktiPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('buktipembayaran', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id_bukti')->unique()->unsigned();
          $table->integer('id_kelas_pelajar')->unique()->unsigned();
          $table->string('file');

          $table->foreign('id_kelas_pelajar')
              ->references('id_kelas_pelajar')
              ->on('kelaspelajar');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buktipembayaran');
    }
}
