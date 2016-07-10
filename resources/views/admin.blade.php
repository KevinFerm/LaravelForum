@extends('layouts.app')

@section('content')

<div class="col-sm-6">
<h2>Add new Category</h2>
  {!! Form::open(array('url' => 'forum/addcat')) !!}
  {{ Form::label('name', 'Name') }}
  {{ Form::text('cat_name', null, ['class' => 'form-control']) }}
  {{ Form::label('desc', 'Description') }}
  {{ Form::text('cat_desc', null, ['class' => 'form-control']) }}
  {{ Form::hidden('cat_type', 1) }}
  {{ Form::submit('Add Category') }}
  {!! Form::close() !!}
  <h2>Categories</h2>
  @foreach($categories as $category)
    <h3>{{$category->name}}  {{Form::button('Delete Cat', ['id' => 'cat_del_'.$category->id, 'class' => 'cat_del btn btn-danger'])}}</h3> <br>
    @foreach($forums as $forum)
      @if($forum->cat_id == $category->id)
        {{$forum->name}}
        {{Form::select('change_cat', $catNames,null, ['id' =>'change_cat_'.$forum->id, 'class' => 'change_cat form_control']) }}
        {{Form::button('Delete', ['id' => 'forum_del_'.$forum->id, 'class' => 'forum_del btn btn-danger'])}}
      @endif
    @endforeach
  @endforeach
  <h2>Add new Forum</h2>
  @if($catNames)
    {!! Form::open(array('url' => 'forum/addforum')) !!}
    {{ Form::token() }}
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    {{ Form::label('desc', 'Description') }}
    {{ Form::text('desc', null, ['class' => 'form-control']) }}
    {{ Form::label('category', 'Category') }}
    {{ Form::select('category', $catNames,null, ['class' => 'form-control']) }}
    {{ Form::hidden('type', 0) }}
    {{ Form::submit('Add Forum') }}
    {!! Form::close() !!}
  @endif
  <h2>Forums</h2>
  @foreach($forums as $forum)
    {{$forum->name}} <br>
  @endforeach

  <h2>Users</h2>

  <h2>Add new Category</h2>

</div>
@endsection
