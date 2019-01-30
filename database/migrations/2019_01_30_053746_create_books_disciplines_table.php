<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_disciplines', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');
            $table->unsignedInteger('discipline_id');
            $table->foreign('discipline_id')->references('id')->on('disciplines');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_disciplines');
    }
}
