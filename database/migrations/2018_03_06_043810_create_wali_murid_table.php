<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaliMuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wali_murid', function (Blueprint $table) {
            $table->increments('id_walimurid');
            $table->string('nama',100);
            $table->string('pekerjaan', 50);
            $table->string('agama', 20);
            $table->string('telp', 14);
            $table->text('alamat');
            $table->integer('siswa_id')->unsigned()->index();
            $table->string('username', 100);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('siswa_id')->references('id_siswa')->on('siswa')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wali_murid');
    }
}
