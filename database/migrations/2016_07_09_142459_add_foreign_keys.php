<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('posts', function (Blueprint $table) {
        $table->foreign('topic_id')->references('id')->on('topics');

        $table->foreign('forum_id')->references('id')->on('forums');

        $table->foreign('poster_id')->references('id')->on('users');

      });

      Schema::table('topics', function (Blueprint $table) {
        $table->foreign('forum_id')->references('id')->on('forums');

        $table->foreign('poster_id')->references('id')->on('users');


      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
