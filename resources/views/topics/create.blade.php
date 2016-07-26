@extends('layouts.app')

@section('content')
<div class="container">
  {!! Form::open(array('url' => '/forum/topic/new')) !!}
  {{ Form::label('title', 'Title') }}
  {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'test']) }}
  {{ Form::label('post_text', 'Text') }}
  {{ Form::textarea('post_text', null, ['class' => 'form-control', 'id' => 'summernote']) }}
  {{ Form::hidden('forum_id', $forum_id) }}
  {{ Form::hidden('poster_id', Auth::user()->id) }}
  {{ Form::hidden('poster_username', Auth::user()->username) }}
  {{ Form::submit('Create Topic') }}
  {!! Form::close() !!}

</div>
@endsection
