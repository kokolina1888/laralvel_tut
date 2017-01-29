@extends('layouts.master')
@section('content')
<h1>Welcome to TODOParrot</h1>

@endsection
@section('advertisement')
@parent
<p>
    Buy the TODOPArrot Productivity guide for $10!
</p>

<!-- <table class="table borderless">
    @foreach($links as $link)
    include('partials.row', ('link' => $link))
    @endforeach
</table> -->
@endsection
