<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TopicController extends Controller
{
    //
    public function viewTopic() {
      return view('/topics/view.blade.php');
    }
}
