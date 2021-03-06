@extends('layouts.master')

@section('content')

<h1>Lists</h1>

@if (session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif

@if($lists->count() > 0)

{!! $lists->render() !!}

@foreach($lists as $list)

{{ $list->name}}

@endforeach

@else 
<p>
	No lists found!
</p>
@endif
@endsection