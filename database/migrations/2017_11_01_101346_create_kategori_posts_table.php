<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_posts', function (Blueprint $table) {
            $table->integer('posting_id')->unsigned()->index();
            $table->integer('kategori_id')->unsigned()->index();;
            $table->timestamps();

            $table->foreign('posting_id')->references('id')->on('postings')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_posts');
    }
}
