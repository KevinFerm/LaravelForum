<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Topic extends Model
{
    //
    public function post() {
      return $this->hasMany('App\Posts');
    }

    public static function getTopics($forum_id) {
      return DB::table('topics')->where('forum_id', $forum_id)->get();
    }

    public static function getTopic($id) {
      return DB::table('topics')->where('id', $id)->get();
    }

    public static function createTopic($forum_id, $poster_id, $first_post_id, $title) {
      return DB::table('topics')->insert([
        'forum_id' => $forum_id,
        'poster_id' => $poster_id,
        'first_post_id' => $first_post_id,
        'title' => $title,
        'status' => 0
      ]);
    }
}
