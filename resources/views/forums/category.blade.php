@extends('layouts.app')

@section('content')

<div class="container">
  <a href="/forum/topic/new/{{$id}}">{{Form::button('New Topic')}}</a>

  <h3>Topics</h3>
    <table class="table forum table-striped">
      <thead>
        <tr>
          <th class="cell-stat"></th>
          <th>
            <h3>{{$forum->name}}</h3>
          </th>
          <th class="cell-stat text-center hidden-xs hidden-sm">Views</th>
          <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
          <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
        </tr>
      </thead>
      <tbody>
        @foreach($topics as $topic)
            <tr>
              <td class="text-center"><i class="fa fa-question fa-2x text-primary"></i></td>
              <td>
                <h4><a href="/forum/show/{{$topic->id}}-{{str_slug($topic->title, "-")}}">{{$topic->title}}</a><br>
                  <td class="text-center hidden-xs hidden-sm"><a href="#">0</a></td>
                  <td class="text-center hidden-xs hidden-sm"><a href="#">0</a></td>
                  <td class="hidden-xs hidden-sm">by <a href="#">John Doe</a><br><small><i class="fa fa-clock-o"></i> 3 months ago</small></td>
              </td>
            </tr>
        @endforeach
      </tbody>
    </table>

{{ $topics->links() }}
  </div>

</div>
@endsection
