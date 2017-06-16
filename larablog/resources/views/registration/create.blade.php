@extends('layouts.master')

@section('content')


<form action="{{ route('register')}}" role="form" method="POST" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	@include('partials.errors')
	<div class="form-group">
		<label for="name" class="col-md-3 control-label">
			username
		</label>
		<div class="col-md-8">
			<input type="text" name="name" id="username"  class="form-control" value="">
		</div>
	</div>
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
			<input type="password" name="password" id="password"  class="form-control" value="">		
			
		</div>
	</div>
	<div class="form-group">
		<label for="password_confirmation" class="col-md-3 control-label">
			password confirm	
		</label>
		<div class="col-md-8">
			<input type="password" name="password_confirmation" id="password"  class="form-control" value="">		
			
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