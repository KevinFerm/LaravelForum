<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Topic;
use App\Post;
use App\User;
class TopicController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function viewTopic($slug) {
      $id = explode("-", $slug);
      $id = $id[0];
      $posts = Post::where('topic_id', $id)->paginate(8);
      $topic = Topic::where('id', $id)->first();
      $poster = User::where('id', $topic->poster_id)->first();

      foreach ($posts as $post => $value) {
        # Adding user data to $posts variable so I can get
        # them in the blade later
        $user = User::where('id', $value->poster_id)->first();
        $posts[$post]->userData = $user;
      }

      return view('/topics/topic', ['posts' => $posts, 'id' => $id, 'topic' => $topic, 'poster' => $poster]);
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
