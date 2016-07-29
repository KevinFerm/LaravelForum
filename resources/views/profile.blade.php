@extends('layouts.app')

@section('content')
<div class="container">
  <div class="profile">
    <div class="user">
      <div class="basic">
        <div class="icon"><i class="fa fa-user"></i></div>
        <div class="name"><span>{{$user->username}}</span></div>
      </div>
      <div class="stats">
        <div class="item"><span>Posts</span><span class="val">{{$user->posts}}</span></div>
        <div class="item"><span>Name</span><span class="val">{{$user->name}}</span></div>
      </div>
    </div>
    <div class="info">
      <div class="left"></div>
      <div class="right"></div>
    </div>
  </div>
</div>
@endsection
