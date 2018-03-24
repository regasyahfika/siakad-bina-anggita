<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->increments('id_absen');
            $table->integer('siswa_id')->unsigned()->index();
            $table->integer('kelas_id')->unsigned()->index();
            $table->integer('ruang_id')->unsigned()->index();
            $table->integer('tahun_id')->unsigned()->index();
            $table->integer('program_id')->unsigned()->index();
            $table->integer('guru_id')->unsigned()->index();
            $table->date('tanggal');
            $table->string('data_absensi', 50);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();

            $table->foreign('siswa_id')->references('id_siswa')->on('siswa')->onDelete('CASCADE');
            $table->foreign('kelas_id')->references('id_kelas')->on('kelas')->onDelete('CASCADE');
            $table->foreign('ruang_id')->references('id_ruang')->on('ruang')->onDelete('CASCADE');
            $table->foreign('tahun_id')->references('id_tahun')->on('tahun_akademik')->onDelete('CASCADE');
            $table->foreign('program_id')->references('id_program')->on('program_kelas')->onDelete('CASCADE');
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
        Schema::dropIfExists('absensi');
    }
}
