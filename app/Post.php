<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function topic() {
      return $this->belongsTo('App\Topic');
    }

    public static function createPost() {
      
    }
}
