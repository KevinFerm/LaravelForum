@extends('layouts.app')

@section('content')

<div class="col-sm-6">
<h2>Add new Category</h2>
  {!! Form::open(array('url' => 'forum/add')) !!}
  {{ Form::label('name', 'Name') }}
  {{ Form::text('name', null, ['class' => 'form-control']) }}
  {{ Form::label('desc', 'Description') }}
  {{ Form::text('desc', null, ['class' => 'form-control']) }}
  {{ Form::hidden('type', 1) }}
  {{ Form::submit('Add Category') }}
  {!! Form::close() !!}
  <h2>Categories</h2>
  @foreach($categories as $category)
    {{$category->name}} <br>
  @endforeach
  <h2>Add new Forum</h2>
  {!! Form::open(array('url' => 'forum/add')) !!}
      //
  {!! Form::close() !!}
  <h2>Forums</h2>
  <h2>Users</h2>

  <h2>Add new Category</h2>

</div>
@endsection
