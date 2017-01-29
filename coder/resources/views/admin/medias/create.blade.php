@extends('layouts.admin')
@section('styles')
@stop

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

@section('content')
<h1>Upload new photo, {{ Auth::user()->name }}</h1>

<div class="container">

  {!!Form::open(['method'=>'POST', 'action' => 'AdminMediasController@store', 'files'=>true, 'class'=>'dropzone'])!!}
  
  {!!Form::close()!!}
  
</div>
@stop
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

@stop