@extends('layouts.app')

@section('content')
<div class="container">
  {!! Form::open(array('url' => '/forum/topic/new')) !!}
  {{ Form::label('title', 'Title') }}
  {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'test']) }}
  {{ Form::label('text', 'Text') }}
  {{ Form::text('text', null, ['class' => 'form-control', 'id' => 'summernote']) }}
  {{ Form::hidden('forum_id', $forum_id) }}
  {{ Form::submit('Create Topic') }}
  {!! Form::close() !!}

</div>
@endsection
