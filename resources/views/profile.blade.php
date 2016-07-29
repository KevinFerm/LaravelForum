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
        <div class="item"><span>Registered</span><span class="val">{{$user->created_at->diffForHumans()}}</span></div>
        <div class="item"><span>Location</span><span class="val">{{$user->location}}</span></div>
        <div class="item"><span>Email</span><span class="val">{{$user->email}}</span></div>
        <div class="item"><span>Registered</span><span class="val">{{$user->type}}</span></div>
      </div>
    </div>
    <div class="info">
    @if($user->id == Auth::user()->id)
        @include('_profile-edit')
    @endif
    </div>
  </div>
</div>
@endsection
