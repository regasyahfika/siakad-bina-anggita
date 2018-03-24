<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelasSiswaGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas_siswa_guru', function (Blueprint $table) {
            $table->increments('id_klguru');
            $table->integer('guru_id')->unsigned()->index();
            $table->integer('klsiswa_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('guru_id')->references('id_guru')->on('guru')->onDelete('CASCADE');
            $table->foreign('klsiswa_id')->references('id_klsiswa')->on('kelas_siswa')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelas_siswa_guru');
    }
}
