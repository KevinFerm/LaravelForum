@extends('layouts.app')
@section('content')
<div class="container">
  <h1>{{$topic->title}}</h1> <br>
  <h4><b>Author: </b><a href="/profile/{{$poster->id}}-{{$poster->username}}">{{$poster->username}}</a></h4>
  <a class="white" href="/forum/post/new/{{$id}}/{{$topic->forum_id}}" style="float: right;">{{Form::button('New Post', ['class' => 'btn-xlarge'])}}</a> {{ $posts->links() }}
  @foreach($posts as $key => $post)
  <div class="post-info-bar"><p class="left">{{$post->created_at}}</p><p class="right">#{{$key+1}}</p></div>
  <div class="post">
    <div class="post-user-area">
      <h3><a href="/profile/{{$post->userData->id}}-{{$post->userData->username}}">{{$post->userData->username}}</a></h3>
      <a class="user-avatar hidden-xs hidden-sm" href="/profile/{{$post->userData->id}}-{{$post->userData->username}}">sup</a>
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
      <p>{!! $post->text !!}</p>
    </div>
    <div class="post-status-bar">
      @if(Auth::user()->id == $post->poster_id)
      <p class="left">
        <a href="/forum/edit/post/{{$post->id}}">Edit Post</a> |
        <a href="/forum/delete/post/{{$post->id}}">Delete Post</a>
      </p>
      @endif
    </div>
  </div>
  @endforeach
  {{ $posts->links() }}
  {{-- @include('posts/_quickreply') --}}<br><br><br>
</div>
@endsection
