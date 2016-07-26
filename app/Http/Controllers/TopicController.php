<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TopicController extends Controller
{
    //
    public function viewTopic() {
      return view('/topics/topic');
    }

    public function newTopic($forum_id) {
      return view('/topics/create', ['forum_id' => $forum_id]);
    }

    public function createTopic() {}

    public function deleteTopic() {}

    public function editTopic() {}

}
