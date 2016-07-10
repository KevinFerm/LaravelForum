@foreach($categories as $category)
  <h3>{{$category->name}}  {{Form::button('Delete Cat', ['id' => 'cat_del_'.$category->id, 'class' => 'cat_del btn btn-danger'])}}</h3> <br>
  @foreach($forums as $forum)
    @if($forum->cat_id == $category->id)
      {{$forum->name}}
      {{Form::select('change_cat', $catNames,null, ['placeholder' => 'Cat', 'id' =>'change_cat_'.$forum->id, 'class' => 'change_cat form_control']) }}
      {{Form::button('Delete', ['id' => 'forum_del_'.$forum->id, 'class' => 'forum_del btn btn-danger'])}}
    @endif
  @endforeach
@endforeach
