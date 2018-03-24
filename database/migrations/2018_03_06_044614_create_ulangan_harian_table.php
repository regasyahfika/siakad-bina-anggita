<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUlanganHarianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulangan_harian', function (Blueprint $table) {
            $table->increments('id_harian');
            $table->integer('siswa_id')->unsigned()->index();
            $table->integer('kelas_id')->unsigned()->index();
            $table->integer('guru_id')->unsigned()->index();
            $table->integer('mapel_id')->unsigned()->index();
            $table->integer('tahun_id')->unsigned()->index();
            $table->string('materi',50);
            $table->date('tanggal');
            $table->integer('nilai');
            $table->string('deskripsi',100);
            $table->timestamps();

            $table->foreign('siswa_id')->references('id_siswa')->on('siswa')->onDelete('CASCADE');
            $table->foreign('kelas_id')->references('id_kelas')->on('kelas')->onDelete('CASCADE');
            $table->foreign('guru_id')->references('id_guru')->on('guru')->onDelete('CASCADE');
            $table->foreign('mapel_id')->references('id_mapel')->on('mata_pelajaran')->onDelete('CASCADE');
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
        Schema::dropIfExists('ulangan_harian');
    }
}
