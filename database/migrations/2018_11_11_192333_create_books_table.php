<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->integer('shelf_id')->unsigned();
            $table->integer('publisher_id')->unsigned();
            $table->string('ISBN')->unique();
            $table->string('key_word');
            $table->mediumText('book_description');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('category_id')->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('author_id')->references('id')
                ->on('authors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('shelf_id')->references('id')
                ->on('shelves')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('publisher_id')->references('id')
                ->on('publishers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('books');
        Schema::enableForeignKeyConstraints();
    }
}
