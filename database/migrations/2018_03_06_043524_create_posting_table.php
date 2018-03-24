<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posting', function (Blueprint $table) {
            $table->increments('id_posting');
            $table->string('judul',100);
            $table->string('slug',100);
            $table->text('konten');
            $table->boolean('status')->nullable();
            $table->string('image',50)->nullable();
            $table->integer('kategori_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id_kategori')->on('kategori')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posting');
    }
}
