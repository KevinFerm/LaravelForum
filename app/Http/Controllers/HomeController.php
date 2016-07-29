<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\libs\userlib;
use Auth;
use App\Forum;
use App\User;
use App\Topic;
use Input;
use Validator;
use Redirect;
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

    public function editProfile(Request $request) {
            $avatar = $request->input('avatar');
            $file = array('avatar' => $avatar);
            // setting up rules
            $rules = array('avatar' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
             // doing the validation, passing post data, rules and the messages
            $validator = Validator::make($file, $rules);
            if($validator->fails())
                return $validator->errors()->all();

            if (Input::file('avatar')->isValid()) {
                $imgname = Auth::user()->id .'.'. $avatar->getClientOriginalExtension();
                $avatar->move(base_path(). '/public/images/avatars', $imgname);
              // sending back with message
            $set = User::where('id', Auth::user()->id)->update([
                'name' => $request->input('name'),
                'location' => $request->input('location'),
                'avatar' => $imgname
                ]);
              Session::flash('success', 'Upload successfully');
              return redirect('/profile');
            }
            return redirect('/');

            #$set = User::where('id', Auth::user()->id)->update([
             #   'name' => $request->input('name'),
              #  'location' => $request->input('location')
               # ]);
            return redirect('/profile');
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
