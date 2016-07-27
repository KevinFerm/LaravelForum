@extends('layouts.app')

@section('content')

<div class="container">
  <a href="/forum/post/new/{{$id}}/{{$topic->forum_id}}">{{Form::button('New Post')}}</a>

  @foreach($posts as $post)
    <div class="post">
    <div class="post-user-area">
    test
    </div>
    <div class="post-text-area">
    <br>{{$post->subject}} <br> <br>
    {!! $post->text !!}
    </div>
    </div>
  @endforeach

{{ $posts->links() }}
</div>
@endsection
