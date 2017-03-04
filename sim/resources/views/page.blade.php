@extends('layouts.frontend')
@section('title', $page->title)

@section('content')

@if($page->view)
{!! $page->view->render() !!}
@endif
{!! Markdown::convertToHtml($page->content);!!}

@endsection