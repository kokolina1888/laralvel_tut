@extends('layouts.admin')

@section('content')
<h1>Edit User, {{ $_GET['auth_user'] }} </h1>
<div class="container">
<div class="row">

<div class="col-sm-9">
  {!!Form::model($user, ['method'=>'PUT', 'action' => ['AdminUsersController@update', $user->id], 'files'=>true])!!}
  {{csrf_field()}}
  <div class="form-group">
  {!!Form::label('name', 'Name')!!}
  {!!Form::text('name', null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
  {!!Form::file('photo_id', null, ['class'=>'form-control'])!!}
  @if($user->photo_id)
  <img src="{{url($user->photo->file)}}" alt="" height="200">
  @else 
  <img src="http://placehold.it/200x200" alt="">
  @endif
  
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
  {!!Form::select('role_id', $roles, null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group">
  {!!Form::label('status', 'Status')!!}
  {!!Form::select('is_active', [''=>'choose options', 1=>'active', 0 =>'inactive'], null, ['class'=>'form-control'])!!}
  </div>
  <div class="row">
  <div class="col-sm-3"></div>
   <div class="form-group col-sm-3">
   {!!Form::submit('Edit user', ['class'=>'btn btn-primary btn-lg'])!!}
  </div>
  {!!Form::close()!!}

  {!!Form::open(['method'=> 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]])!!}
  <div class="form-group form-group col-sm-3">
  	{!!Form::submit('Delete User', ['class' => 'btn btn-danger btn-lg'])!!}
  </div>
  {!!Form::close()!!}
  </div>

</div>
  
</div>
</div>

@stop
