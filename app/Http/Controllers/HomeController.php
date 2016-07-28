<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\libs\userlib;
use Auth;
use App\Forum;
use App\User;
use App\Topic;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile($id='none') {
        if($id=='none') {
            return view('profile', ['user' => Auth::user()]);
        } else {
            $s = explode("-", $id);
            $s = $s[0];
            return view('profile', ['user' => User::where('id', $s)->first()]);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    public function admin() {
      if(UserLib::isAdmin(Auth::user()->id)){
        $categories = Forum::getCategories();
        $catName = [];
        foreach($categories as $category) {
          $catName["$category->id"] = $category->name;
        }
        return view('admin', ['catNames' => $catName, 'categories' => $categories, 'forums' => Forum::getForums()]);
      } else {
        return view('home');
      }
    }
}
