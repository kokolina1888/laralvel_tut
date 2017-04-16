@extends('site.noadmin')

@section('content')
<div class="wrapper container-fluid">
	<div class="row">

		<div class="col-xs-8 col-xs-offset-2">
			{{ $portfolio->name}}
		</div>
	</div>

	<div class="row">
		
		<div class="col-xs-8 col-xs-offset-2">
			{{ $portfolio->filter}}
		</div>
	</div>

	
	<div class="col-xs-8 col-xs-offset-2">
		<div class="portfolio_img"> {{ Html::image('assets/img/'.$portfolio->images,$portfolio->name)}} </div>  
	</div>
</div>
<a href="{{ route('home')}}">Back</a>
</div>
@endsection