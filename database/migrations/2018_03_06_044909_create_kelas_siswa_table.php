<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_siswa', function (Blueprint $table) {
            $table->increments('id_klsiswa');
            $table->integer('siswa_id')->unsigned()->index();
            $table->integer('kelas_id')->unsigned()->index();
            $table->integer('ruang_id')->unsigned()->index();
            $table->integer('program_id')->unsigned()->index();
            $table->integer('tahun_id')->unsigned()->index();
            $table->string('keterangan', 100);
            $table->timestamps();

            $table->foreign('siswa_id')->references('id_siswa')->on('siswa')->onDelete('CASCADE');
            $table->foreign('kelas_id')->references('id_kelas')->on('kelas')->onDelete('CASCADE');
             $table->foreign('ruang_id')->references('id_ruang')->on('ruang')->onDelete('CASCADE');
            $table->foreign('program_id')->references('id_program')->on('program_kelas')->onDelete('CASCADE');
            $table->foreign('tahun_id')->references('id_tahun')->on('tahun_akademik')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas_siswa');
    }
}
