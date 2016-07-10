<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Forum extends Model
{
    //
    protected $fillable = [
        'name', 'desc', 'type', 'cat_id', 'parent_id'
    ];

    public static function getCategories() {
      return DB::table('forums')->where('type', 1)->get();
    }

    public static function getForums($cat_id=0) {
      if($cat_id==0)
        return DB::table('forums')->where([['type', 0]])->get();

      return DB::table('forums')->where([['type', 0], ['cat_id', $cat_id]])->get();

    }

    public static function addCategory($cat_name, $cat_desc, $cat_type) {
      return DB::table('forums')->insert([
        'name' => $cat_name,
        'desc' => $cat_desc,
        'type' => $cat_type
      ]);
    }

    public static function addForum($forum_name, $forum_desc, $cat_id, $parent=0){
    if($parent == 0) {
      return DB::table('forums')->insert([
        'name' => $forum_name,
        'desc' => $forum_desc,
        'cat_id' => intval($cat_id),
        'parent_id' => intval($parent),
        'type' => 0
      ]);
    }
  }

  public static function changeName($id, $name) {
    return DB::table('forums')->where('id', $id)->update(['name' => $name]);
  }

  public static function deleteForum($forum_id) {
    return DB::table('forums')->where('id', $forum_id)->delete();
  }

  public static function changeCat($forum_id, $cat_id) {
    return DB::table('forums')->where('id', $forum_id)->update(['cat_id' => $cat_id]);
  }

}
