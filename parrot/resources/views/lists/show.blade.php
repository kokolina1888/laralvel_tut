@extends('layouts.master')

@section('content')

<h1> {{ $list->name }}</h1>

<p>
	Created on: {{ $list->created_at }}
	Last modified: {{ $list->updated_at }}
</p>
<p>
	{{ $list->note }}
</p>

@endsection