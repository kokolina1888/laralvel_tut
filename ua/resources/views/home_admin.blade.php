@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Dashboard</div>

                <div class="panel-body">
                    You are logged in,  {{ Auth::user()->name }} is {{ Auth::user()->role->name }}!
                </div>
                <div class="panel-body">
                    <a href="{{url('/logout')}}">Logout</a>
                </div>
                 <a href="{{url('/profile')}}">profile</a>
            </div>
        </div>
    </div>
</div>
@endsection
