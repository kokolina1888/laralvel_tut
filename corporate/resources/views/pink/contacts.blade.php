@extends(env('THEME').'.layouts.site')


@section('navigation')
{!! $navigation !!}
@stop

@section('content')
{!! $content !!}
@stop

@section('bar')
{!! $leftbar!!}
@stop

@section('footer')
{!! $footer !!}
@stop