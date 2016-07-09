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
        return view('admin', ['categories' => Forum::getCategories(), 'forums' => Forum::getForums()]);
      } else {
        return view('home');
      }
    }
}
