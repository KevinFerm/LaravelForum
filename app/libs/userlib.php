<?php
namespace App\libs;
use DB;

class userlib {

  public static function isAdmin($user_id) {
    $user = DB::table('users')->where('id', $user_id)->first();
    if($user->type == 4) {
      return true;
    } else {
      return false;
    }
  }
}
