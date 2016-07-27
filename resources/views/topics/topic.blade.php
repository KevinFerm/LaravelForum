@extends('layouts.app')

@section('content')

<div class="container">
  <a href="/forum/post/new/{{$id}}/{{$topic->forum_id}}">{{Form::button('New Post')}}</a>

  @foreach($posts as $post)
    <div class="post">
    <br>{{$post->subject}} <br> <br>
    {!! $post->text !!}
    </div>
  @endforeach

{{ $posts->links() }}
</div>
@endsection
