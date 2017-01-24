@extends('layouts.admin')
@section('page_title')
<h1>Edit Posts, {{$_GET['auth_user']}}</h1>
@stop

@section('content')
<div class="row">

  <div class="col-sm-9">
    {!!Form::model($post,  ['method'=>'PUT', 'action' => ['AdminPostsController@update', $post->id], 'files'=>true])!!}
    {{csrf_field()}}
    {!! Form::hidden('user_id', $user_id )!!}


    <div class="form-group">
     {!!Form::label('title', 'Title: ')!!}
     {!!Form::text('title', null, ['class'=>'form-control'])!!}
   </div>
   <div class="form-group">
     {!!Form::label('body', 'Content: ')!!}
     {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
   </div>

   <div class="form-group">
    {!!Form::label('photo_id', 'Photo: ')!!}

    {!!Form::file('photo_id', null, ['class'=>'form-control'])!!}
    @if($post->photo_id)
    <img src="{{url($post->photo->file)}}" alt="" height="200">
    @else 
    <img src="http://placehold.it/200x200" alt="">
    @endif

  </div>
  <div class="form-group">
    {!!Form::label('category_id', 'Category')!!}
    {!!Form::select('category_id', $categories, null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
   {!!Form::submit('Edit post', ['class'=>'btn btn-primary'])!!}
 </div>
 {!!Form::close()!!}
 {!!Form::open(['method'=> 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]])!!}
  <div class="form-group form-group col-sm-3">
    {!!Form::submit('Delete Post', ['class' => 'btn btn-danger btn-lg'])!!}
  </div>
  {!!Form::close()!!}
  </div>
</div>
</div>

@stop