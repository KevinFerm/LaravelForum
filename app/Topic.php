<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Post;
class Topic extends Model
{
    //
      protected $fillable = [
        'name', 'desc', 'type', 'cat_id', 'parent_id',
        'forum_id', 'poster_id', 'title', 'status', 'created_at', 'updated_at',
        'poster_username', 'post_text', 'poster_id', 'first_post_id'
    ];

    public function post() {
      return $this->hasMany('App\Posts');
    }

    public static function getTopics($forum_id) {
      return DB::table('topics')->where('forum_id', $forum_id)->get();
    }

    public static function getTopic($id) {
      return DB::table('topics')->where('id', $id)->get();
    }

    public static function createTopic($forum_id, $poster_id, $title, $post_text, $poster_username) {
      $topic = DB::table('topics')->insertGetId([
        'forum_id' => $forum_id,
        'poster_id' => $poster_id,
        'title' => $title,
        'status' => 0,
        "created_at" =>  \Carbon\Carbon::now(),
        "updated_at" => \Carbon\Carbon::now()
      ]);
      $post = Post::createPost($topic, $poster_id, $title, $post_text, $poster_username, $forum_id);
      return DB::table('topics')->where('id', $topic)->update(['first_post_id' => $post]);
    }

    public static function deleteTopic($topic_id) {
      return DB::table('topics')->where('id', $topic_id);
    }

    public static function editTopic($topic_id, $title, $forum_id=0) {
      if($forum_id == 0) {
        return DB::table('topics')->where('id', $topic_id)->update(['title' => $title]);
      } else {
        return DB::table('topics')->where('id', $topic_id)->update(['title' => $title,'forum_id' => $forum_id]);
      }
    }
}
