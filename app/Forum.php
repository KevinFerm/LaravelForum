<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Forum extends Model
{
    //
    public static function getCategories() {
      return DB::table('forums')->where('type', 1)->get();
    }

    public static function getForums($cat_id=0) {
        return DB::table('forums')->where([['type', 0], ['cat_id', $cat_id]])->get();
    }

    public static function addCategory($cat_name, $cat_desc) {
      return DB::table('forums')->insert([
        'name' => $cat_name,
        'desc' => $cat_desc,
        'type' => 1
      ]);
    }

    public static function addForum($forum_name, $forum_desc, $cat_id, $parent=0){
    if($parent == 0) {
      return DB::table('forums')->insert([
        'name' => $forum_name,
        'desc' => $forum_desc,
        'cat_id' => $cat_id,
        'parent_id' => $parent
      ]);
    }
  }

}
