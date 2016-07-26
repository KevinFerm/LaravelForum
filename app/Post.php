<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Post extends Model
{
    //
      protected $fillable = [
        'poster_id', 'desc', 'type', 'cat_id', 'parent_id', 'topic_id',
        'text', 'subject', 'poster_username', 'created_at', 'updated_at', 'first_post_id', 'forum_id'
    ];

    public function topic() {
      return $this->belongsTo('App\Topic');
    }

    public static function createPost($topic_id, $poster_id, $subject, $text, $username, $forum_id) {
      return DB::table('posts')->insertGetId([
        'poster_id' => $poster_id,
        'forum_id' => $forum_id,
        'topic_id' => $topic_id,
        'subject' => $subject,
        'text' => $text,
        'poster_username' => $username,
        "created_at" =>  \Carbon\Carbon::now(),
        "updated_at" => \Carbon\Carbon::now()
      ]);
    }
}
