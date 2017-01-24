@extends('layouts.admin')

@section('content')
<h1>Edit User</h1>
<div class="container">
@include('includes.form_error')
<div class="col-sm-9">
  {!!Form::model(['method'=>'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files'=>true])!!}
  {{csrf_field()}}
  <div class="form-group">
  {!!Form::label('name', 'Name')!!}
  {!!Form::text('name', null, ['class'=>'form-control'])!!}
  </div>
  <div class="col-sm-3">
  @if($user->photo)
                <img class="img-responsive img-rounded" src="{{$user->photo->file}}" height="400">
            @else 
             <img class="img-responsive img-rounded" src="http://placehold.it/400x400">        
            @endif

    <img class="img-responsive img-rounded" src="{{$user->photo->file}}">
    
  </div>
  <div class="form-group">
  {!!Form::file('photo_id', null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
  {!!Form::label('email', 'Email')!!}
  {!!Form::text('email', null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
  {!!Form::label('password', 'Password')!!}
  {!!Form::password('password', null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
  {!!Form::label('role_id', 'Role')!!}
  {!!Form::select('role_id', [''=>'choose options'] + $roles, $user->role_id, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
  {!!Form::label('status', 'Status')!!}
  {!!Form::select('is_active', [''=>'choose options', 1=>'active', 0 =>'inactive'], null, ['class'=>'form-control'])!!}
  </div>
  
   <div class="form-group">
   {!!Form::submit('Create user', ['class'=>'btn btn-primary'])!!}
  </div>
  {!!Form::close()!!}
  </div>
  
</div>
@stop
