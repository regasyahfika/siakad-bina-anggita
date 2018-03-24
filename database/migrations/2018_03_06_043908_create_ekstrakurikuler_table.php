<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEkstrakurikulerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekstrakurikuler', function (Blueprint $table) {
            $table->increments('id_ekskul');
            $table->string('nama_ekskul', 20);
            $table->string('keterangan', 30);
            $table->string('gambar', 30)->nullable();
            $table->integer('guru_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('guru_id')->references('id_guru')->on('guru')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ekstrakurikuler');
    }
}
