<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Topic;
class TopicController extends Controller
{
    //
    public function viewTopic() {
      return view('/topics/topic');
    }

    public function newTopic($forum_id) {
      return view('/topics/create', ['forum_id' => $forum_id]);
    }

    public function createTopic(Request $request) {
      if($request->input('post_text')) {
        $topic = Topic::createTopic(
            $request->input('forum_id'),
            $request->input('poster_id'),
            $request->input('title'),
            $request->input('post_text'),
            $request->input('poster_username')
          );
        return redirect('/');
      } else {
        echo $request->input('title');
      }
    }

    public function deleteTopic() {}

    public function editTopic() {}

}
