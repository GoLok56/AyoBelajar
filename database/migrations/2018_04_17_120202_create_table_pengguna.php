<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePengguna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_pengguna');
            $table->string('nama');
            $table->text('biografi');
            $table->string('poto_profil');
            $table->string('email');
            $table->text('password');
            $table->enum('tipe', ['Admin', 'Pengajar', 'Pelajar']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}
