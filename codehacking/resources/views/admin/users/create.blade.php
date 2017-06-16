@extends('layouts.admin')

@section('content')
<h1>Create User</h1>
<div class="container">
@include('includes.form_error')
  {!!Form::open(['method'=>'POST', 'action' => 'AdminUsersController@store', 'files'=>true])!!}
  {{csrf_field()}}
  <div class="form-group">
  {!!Form::label('name', 'Name')!!}
  {!!Form::text('name', null, ['class'=>'form-control'])!!}
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
  <!-- only for key value pairs -->
  {!!Form::select('role_id', [''=>'choose options'] + $roles, null, ['class'=>'form-control'])!!}
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
@stop
