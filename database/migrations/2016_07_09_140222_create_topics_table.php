<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('forum_id')->unsigned();
            //$table->foreign('forum_id')->references('id')->on('forums');
            $table->integer('poster_id')->unsigned();
            //$table->foreign('poster_id')->references('id')->on('users');
            $table->string('title');
            $table->integer('status');
            $table->integer('first_post_id')->unsigned();
            //$table->foreign('first_post_id')->references('id')->on('posts');
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
        Schema::drop('topics');
    }
}
