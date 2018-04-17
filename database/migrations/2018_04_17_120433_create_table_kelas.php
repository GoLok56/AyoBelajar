<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_kelas');
            $table->string('nama');
            $table->text('deskripsi');
            $table->integer('harga');
            $table->date('tanggal_dibuat');
            $table->string('poto');
            $table->integer('id_pengguna')->unique()->unsigned();
            $table->integer('id_kategori')->unique()->unsigned();

            $table->foreign('id_pengguna')
                ->references('id_pengguna')
                ->on('pengguna');

            $table->foreign('id_kategori')
                ->references('id_kategori')
                ->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
