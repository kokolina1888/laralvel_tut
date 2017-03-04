@extends('layouts.admin')
@section('page_title')
{{ Auth::user()->name }}
@stop

@section('content')

<div class="container">
<div class="row">
<div class="col-sm-9">
              
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Photo</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
@if($users)
      @foreach($users as $user)
        <tr>
          <td>{{$user->name}}</td>
          <td></td>
          <td>    
          <img src="{{url($user->photo->file)}}" alt="" height="150">
            </td>
          
          <td>{{$user->role->name}}</td>
          <td>{{$user->is_active ? 'Active' : 'Active'}}</td>
          <td>{{$user->created_at->diffForHumans()}}</td>
          <td>{{$user->updated_at->diffForHumans()}}</td>
          <td><a href="{{route('users.edit', ['user_id'=>$user->id, 'auth_user'=>Auth::user()->name])}}">Edit User</a></td>
        </tr>
        @endforeach
    @endif     
    </tbody>
  </table>
</div>
<a href="{{route('admin.users.create')}}">Create User</a>
</div>
</div>
@stop