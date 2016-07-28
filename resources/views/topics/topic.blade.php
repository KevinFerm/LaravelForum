@extends('layouts.app')

@section('content')

<div class="container">
  <h1>{{$topic->title}}</h1> <br>
  <h4><b>Author: </b><a href="/profile/{{$poster->id}}-{{$poster->username}}">{{$poster->username}}</a></h4>
  <a class="white" href="/forum/post/new/{{$id}}/{{$topic->forum_id}}" style="float: right;">{{Form::button('New Post', ['class' => 'btn-xlarge'])}}</a> {{ $posts->links() }}
  @foreach($posts as $post)
    <div class="post">
    <div class="post-user-area">
    <h3><a href="/profile/{{$post->userData->id}}-{{$post->userData->username}}">{{$post->userData->username}}</a></h3>
    <a class="user-avatar" href="/profile/{{$post->userData->id}}-{{$post->userData->username}}">sup</a>
    <dl>
      <dt>Posts: </dt>
      <dd>{{$post->userData->posts}}</dd>
      <dt>Name: </dt>
      <dd>{{$post->userData->name}}</dd>
      <dt>Registered: </dt>
      <dd>{{$post->userData->created_at}}</dd>
      <dt>Location: </dt>
      <dd>{{$post->userData->location}}</dd>
      <dt>Id: </dt>
      <dd>{{$post->userData->id}}</dd>
    </dl>





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
