<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('topic_id')->unsigned();
            //$table->foreign('topic_id')->references('id')->on('topics');
            $table->integer('forum_id')->unsigned();
            //$table->foreign('forum_id')->references('id')->on('forums');
            $table->integer('poster_id')->unsigned();
            //$table->foreign('poster_id')->references('id')->on('users');
            $table->string('poster_username');
            $table->mediumText('text');
            $table->string('subject');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
