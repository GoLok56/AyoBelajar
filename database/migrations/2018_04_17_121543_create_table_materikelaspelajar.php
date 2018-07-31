<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMaterikelaspelajar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materikelaspelajar', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id_kelas_pelajar')->unsigned();
            $table->integer('id_materi')->unique()->unsigned();
            $table->boolean('status');

            $table->foreign('id_kelas_pelajar')
                ->references('id_kelas_pelajar')
                ->on('kelaspelajar');

            $table->foreign('id_materi')
                ->references('id_materi')
                ->on('materi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materikelaspelajar');
    }
}
