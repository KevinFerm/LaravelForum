<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Forum;
use App\User;
use App\libs\userlib;
use Auth;
use App\Http\Requests;

class ForumController extends Controller
{
    //Adds a category
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

    //Adds a forum
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

    public function getCategories() {
      if(UserLib::isAdmin(Auth::user()->id)){
        $categories = Forum::getCategories();
        $catName = [];
        foreach($categories as $category) {
          $catName["$category->id"] = $category->name;
        }
        return (string) view('partials/_admin_categories', ['catNames' => $catName, 'categories' => $categories, 'forums' => Forum::getForums()]);
      } else {
        return view('home');
      }
    }
    //Deletes a forum
    public function deleteForum(Request $request) {
      if(!UserLib::isAdmin(Auth::user()->id))
        return 33;
      return Forum::deleteForum($request->input('forum_id'));
    }

    //Changes name of a forum
    public function changeName(Request $request) {
      if(!UserLib::isAdmin(Auth::user()->id))
        return false;
      return Form::changeName($request->input('id'),$request->input('name'));
    }

    //Changes category of a forum
    //cat_id is the new category id
    public function changeCat(Request $request) {
      if(!UserLib::isAdmin(Auth::user()->id))
        return false;
      return Forum::changeCat($request->input('forum_id'), $request->input('cat_id'));
    }
}
