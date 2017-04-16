@extends('layouts.site')

@section('header')
@include('site.header')
@endsection

@section('content')
	@yield('section')
@endsection