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
    public function addCategory($array) {
      return Forum::create([
        'name' => $request->input('name'),
        'desc' => $request->input('desc'),
        'type' => $request->input('type')
      ]);
    }

    public function add(Request $request) {
      if($request->input('type')) {
        Forum::addCategory(
          $request->input('name'),
          $request->input('desc')
        );
        return redirect('/admin');
      } else {
        return false;
      }
    }
}
