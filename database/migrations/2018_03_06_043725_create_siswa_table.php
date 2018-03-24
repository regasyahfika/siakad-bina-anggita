<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id_siswa');
            $table->string('nis', 50)->unique();
            $table->string('nama',100);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir',20);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('foto', 50)->nullable();
            $table->string('agama', 20);
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
        Schema::dropIfExists('siswa');
    }
}
