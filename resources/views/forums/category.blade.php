@extends('layouts.app')

@section('content')

<div class="container">
  <a href="/forum/topic/new/{{$id}}">{{Form::button('New Topic')}}</a>

</div>
@endsection
