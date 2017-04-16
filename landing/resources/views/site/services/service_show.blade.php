@extends('site.noadmin')

@section('content')

<section  id="service">
	<div class="container">
		<h2>Services</h2>
		<div class="service_wrapper">

				<div class="row">
				
				<div class="col-lg-4">
					<div class="service_block">
						<div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa {{ $service->icon}}"></i></span> </div>
						<h3 class="animated fadeInUp wow">{{ $service->name }}</h3>
						<p class="animated fadeInDown wow">{{ $service->text }}</p>
					</div>
				</div>

				
			</div>
		
		</div>
	</div>          
</section>

@endsection