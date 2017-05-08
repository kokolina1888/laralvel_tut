@extends(env('THEME').'.layouts.admin')

@section('navigation')
	{!! $navigation !!}
	
@endsection

@section('content')
	{!! $content or '' !!}
	
@endsection

@section('footer')
	{!! $footer !!}
@endsection 