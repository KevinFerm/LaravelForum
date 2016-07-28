<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Topic;
use App\Post;
use Auth;
use App\Http\Requests;

class PostController extends Controller
{
    //
      public function __construct()
    {
        $this->middleware('auth');
    }
  public function newPost($topic_id, $forum_id) {
      return view('/posts/create', ['topic_id' => $topic_id, 'forum_id' => $forum_id]);  }

  public function createPost(Request $request) {
    if($request->input('post_text')) {
      $topic = Post::createPost(
          $request->input('topic_id'),
          $request->input('poster_id'),
          $request->input('subject'),
          $request->input('post_text'),
          $request->input('poster_username'),
          $request->input('forum_id')
        );
      return redirect('/forum/topic/'.$request->input('topic_id').'-'.str_slug($request->input('subject'), '-'));
    } else {
      echo $request->input('title');
    }
  }

  public function deletePost() {

  }

  public function editPost() {

  }
}
