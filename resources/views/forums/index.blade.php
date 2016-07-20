@extends('layouts.app')

@section('content')
@foreach($categories as $category)
  {{$category->id}}
  <table class="table forum table-striped">
    <thead>
      <tr>
        <th class="cell-stat"></th>
        <th>
          <h3>{{$category->name}}</h3>
        </th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
        <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>>
      </tr>
    </thead>
    <tbody>
      @foreach($forums as $forum)
        @if($forum->cat_id == $category->id)
          <tr>
            <td class="text-center"><i class="fa fa-question fa-2x text-primary"></i></td>
            <td>
              <h4><a href="#">{{$forum->name}}</a><br><small>{{$forum->desc}}</small>
                <td class="text-center hidden-xs hidden-sm"><a href="#">9 542</a></td>
                <td class="text-center hidden-xs hidden-sm"><a href="#">89 897</a></td>
                <td class="hidden-xs hidden-sm">by <a href="#">John Doe</a><br><small><i class="fa fa-clock-o"></i> 3 months ago</small></td>
            </td>
          </tr>
        @endif
      @endforeach
    </tbody>
  </table>
@endforeach

<div class="container" style="margin-top: 35px">
  <div class="page-header page-heading">
    <h1 class="pull-left">Forums</h1>
    <ol class="breadcrumb pull-right where-am-i">
      <li><a href="#">Forums</a></li>
      <li class="active">List of topics</li>
    </ol>
    <div class="clearfix"></div>
  </div>
  <p class="lead">This is the right place to discuss any ideas, critics, feature requests and all the ideas regarding our website. Please follow the forum rules and always check FAQ before posting to prevent duplicate posts.</p>
  <table class="table forum table-striped">
    <thead>
      <tr>
        <th class="cell-stat"></th>
        <th>
          <h3>Important</h3>
        </th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
        <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="text-center"><i class="fa fa-question fa-2x text-primary"></i></td>
        <td>
          <h4><a href="#">Frequently Asked Questions</a><br><small>Some description</small></h4>
        </td>
        <td class="text-center hidden-xs hidden-sm"><a href="#">9 542</a></td>
        <td class="text-center hidden-xs hidden-sm"><a href="#">89 897</a></td>
        <td class="hidden-xs hidden-sm">by <a href="#">John Doe</a><br><small><i class="fa fa-clock-o"></i> 3 months ago</small></td>
      </tr>
      <tr>
        <td class="text-center"><i class="fa fa-exclamation fa-2x text-danger"></i></td>
        <td>
          <h4><a href="#">Important changes</a><br><small>Category description</small></h4>
        </td>
        <td class="text-center hidden-xs hidden-sm"><a href="#">6532</a></td>
        <td class="text-center hidden-xs hidden-sm"><a href="#">152123</a></td>
        <td class="hidden-xs hidden-sm">by <a href="#">Jane Doe</a><br><small><i class="fa fa-clock-o"></i> 1 years ago</small></td>
      </tr>
    </tbody>
  </table>
  <table class="table forum table-striped">
    <thead>
      <tr>
        <th class="cell-stat"></th>
        <th>
          <h3>Open discussion</h3>
        </th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
        <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td colspan="4" class="center">No topics have been added yet.</td>
      </tr>
    </tbody>
  </table>
</div>
</div>

@endsection
