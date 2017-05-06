@extends(env('THEME').'.layouts.site')

@section('title')
{{ $title }}
@stop

@section('navigation')
{!! $navigation !!}
@stop

@section('content')
{!! $content !!}
@stop

@section('bar')
{!! $rightbar or ''!!}
@stop

@section('footer')
{!! $footer !!}
@stop