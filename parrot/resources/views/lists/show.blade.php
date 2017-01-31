@extends('layouts.master')

@section('content')

<h1> {{ $list->name }}</h1>

<p>
	Created on: {{ $list->created_at }}
	Last modified: {{ $list->updated_at }}
</p>
<p>
	{{ $list->description }}
</p>
<h2>Tasks</h2>
@if($list->tasks->count() > 0)
@foreach($list->tasks as $task)
<li>{{ $task->name }}</li>
@endforeach
@else 
<p>
You haven't created any tasks.
	<a href="{{ URL::route('lists.tasks.create', [$list->id])}}" class="btn btn-primary">Create a task</a>
</p>
@endif

@endsection