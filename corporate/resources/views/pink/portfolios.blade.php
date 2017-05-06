@extends(env('THEME').'.layouts.site')



@section('navigation')
{!! $navigation !!}
@stop

@section('content')
{!! $content !!}
@stop


@section('footer')
{!! $footer !!}
@stop