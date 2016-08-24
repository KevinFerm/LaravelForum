@extends('layouts.app')

@section('content')
<div class="container">
  {!! Form::open(array('url' => '/forum/topic/new', 'id' => 'create_topic_form', 'class' => 'create_topic_form')) !!}
  {{ Form::label('title', 'Title') }}
  {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'test']) }}
  {{ Form::label('post_text', 'Text') }}
  {{ Form::textarea('post_text', null, ['class' => 'form-control', 'id' => 'summernote']) }}
  {{ Form::hidden('forum_id', $forum_id) }}
  {{ Form::hidden('poster_id', Auth::user()->id) }}
  {{ Form::hidden('poster_username', Auth::user()->username) }}
  {{ Form::button('Create Topic', array('id' => 'create_topic_button')) }}
  {!! Form::close() !!}

</div>
@endsection
