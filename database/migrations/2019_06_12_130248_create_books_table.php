<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('author_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('issuer');
            $table->integer('year');
            $table->integer('pages');
            $table->string('cover');
            $table->timestamps();
        });

        Schema::table('books', function ($table) {
            $table->foreign('author_id')
                ->references('id')
                ->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
