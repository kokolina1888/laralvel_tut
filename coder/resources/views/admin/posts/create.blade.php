@extends('layouts.admin')
@section('page_title')
<h1>Create Posts, {{ Auth::user()->name }}</h1>
@stop

@section('content')
<div class="row">

  <div class="col-sm-9">
    {!!Form::open(['method'=>'POST', 'action' => 'AdminPostsController@store', 'files'=>true])!!}
    {{csrf_field()}}
    {!! Form::hidden('user_id', Auth::user()->id )!!}
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
  </div>
  <div class="form-group">
    {!!Form::label('category_id', 'Category')!!}
    {!!Form::select('category_id', [''=>'options'] + $categories, null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
   {!!Form::submit('Create post', ['class'=>'btn btn-primary'])!!}
 </div>
 {!!Form::close()!!}
</div>
</div>

@stop