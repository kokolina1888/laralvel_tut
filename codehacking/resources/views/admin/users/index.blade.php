@extends('layouts.admin')

@section('content')
<h1>Users</h1>
<div class="container">
  <table class="table">
    <thead>
      <tr>
       
        <th>Name</th>
        <th>Email</th>
        <th>Photo</th>
        <th>Role</th>
        <th>Active</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    	@if($users)
        @foreach($users as $user)
        <tr>
        <td><a href="{{route('admin-users-edit', $user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>        
            @if($user->photo)
                <img src="{{asset($user->photo->file)}}" height="150">
            @else 
            No user photo            
            @endif
       </td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->is_active== 1 ? 'Active': 'Inactive'}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
            
        </tr>
        @endforeach
        @endif
    </tbody>
  </table>
</div>
@endsection

