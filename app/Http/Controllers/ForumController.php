<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Forum;
use App\User;
use App\Http\Requests;

class ForumController extends Controller
{
    //

    public function addCategory(Request $request) {
      if($request->input('cat_type') == 1) {
        Forum::addCategory(
          $request->input('cat_name'),
          $request->input('cat_desc'),
          $request->input('cat_type')
        );
        return redirect('/admin');
      } else {

      }
    }

    public function addForum(Request $request) {
      Forum::addForum(
      $request->input('name'),
      $request->input('desc'),
      intval($request->input('category')),
      $request->input('parent')
    );
    //echo $request->input('category');
    return redirect('/admin');
    }
}
