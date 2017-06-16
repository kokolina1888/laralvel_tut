@extends('layouts.master')

@section('content')
@if($errors->has('message'))
{{$errors->first('message')}}

@endif
<div class="col-md-6">
	<h1>
		Sign In
	</h1>
</div>

<form action="{{ route('login')}}" role="form" method="POST" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	@include('partials.errors')
	
	<div class="form-group">
		<label for="email" class="col-md-3 control-label">
			email	
		</label>
		<div class="col-md-8">
			<input type="text" name="email" id="email"  class="form-control" value="">		
			
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-md-3 control-label">
			password	
		</label>
		<div class="col-md-8">
			<input type="text" name="password" id="password"  class="form-control" value="">		
			
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-md-6 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
				Register
			</button>
		</div>
	</div>
	
</form>
@endsection