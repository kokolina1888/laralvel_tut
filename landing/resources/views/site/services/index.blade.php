@extends('site.noadmin')

@section('content')
@if(isset($services) && is_object($services))
<!--Service-->
<section  id="service">
	<div class="container">
		<h2>Services</h2>
		<div class="service_wrapper">

			@foreach($services as $k=>$service)
			@if($k == 0 || $k%3 == 0)
			<div class="row {{ ($k != 0) ? 'borderTop' : '' }}">
				@endif
				<div class="col-lg-4 {{ ($k%3 > 0) ? 'borderLeft' : '' }} {{ ($k > 2) ? 'mrgTop' : ''}}">
					<div class="service_block">
						<div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa {{ $service->icon}}"></i></span> </div>
						<h3 class="animated fadeInUp wow"><a href="{{ route('service.show', $service->id)}}">{{ $service->name }}</a></h3>
						<p class="animated fadeInDown wow">{{ $service->text }}</p>
					</div>
				</div>

				@if(($k + 1)%3 == 0)
			</div>
			@endif

			@endforeach     

		</div>
	</div>          
</section>
<!--Service-->
@endif
@endsection