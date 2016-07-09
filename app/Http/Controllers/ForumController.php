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
      if($request->input('type') == 1) {
        Forum::addCategory(
          $request->input('name'),
          $request->input('desc')
        );
        return redirect('/admin');
      } else {

      }
    }

    public function addForum(Request $request) {
      Forum::addCategory(
      $request->input('name'),
      $request->input('desc').
      $request->input('category'),
      $request->input('parent')
    );
    return redirect('/admin');
    }
}
