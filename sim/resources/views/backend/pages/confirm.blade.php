@extends('layouts.backend')
@section('title', 'Delete' . $page->title)
@section('content')
{!! Form::open(['method' => 'delete', 'route' => ['pages.destroy', $page->id]]) !!}
<div class="alert alert-danger">
	<strong>Warning!</strong> You are about to delete a page. This action cannot be undone!
</div>
{!! Form::submit('Yes, delete this page!', ['class' => 'btn btn-danger'])!!}
<a href="{{ route('pages.index') }}" class="btn btn-success"><strong>Noq get me out of here</strong></a>
{!! Form::close() !!}
@endsection