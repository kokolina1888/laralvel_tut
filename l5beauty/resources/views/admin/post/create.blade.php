@extends('admin.layout')
@section('styles')
<link rel="stylesheet" type="text/css" href="/assets/pickadate/themes/default.css">
<link rel="stylesheet" type="text/css" href="/assets/pickadate/themes/classic.date.css">
<link rel="stylesheet" type="text/css" href="/assets/pickadate/themes/classic.time.css">
<link rel="stylesheet" type="text/css" href="/assets/selectize/css/selectize.css">
<link rel="stylesheet" type="text/css" href="/assets/selectize/css/selectize.bootstrap3.css">
@endsection
@section('content')
<div class="container-fluid">
	<div class="row page-title-row">
		<div class="col-md-12">
			<h3>
				Post <small>&raquo; Add New Post</small>
			</h3>

		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						New Post Form
					</h3>
				</div>
				<div class="panel-body">
					@include('admin.partials.errors')
					<form action="{{ route('post.store')}}" role="form" method="POST" class="form-horizontal">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						@include('admin.post._form')

						<div class="col-md-8">
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<button type="submit" class="btn btn-primary btn-lg">
										<i class="fa fa-disk-o">
											
										</i>
										Save New Post
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="/assets/pickadate/picker.js"></script>
<script type="text/javascript" src="/assets/pickadate/picker.date.js"></script>
<script type="text/javascript" src="/assets/pickadate/picker.time.js"></script>
<script type="text/javascript" src="/assets/pickadate/selectize.min.js"></script>

<script>
	$(function(){
		$('#publish_date').pickadate({format: "mmm-d-yyyy"});
		$('#publish_time').pickatime({format: "h:i A"});
		$('#tags').selectize({
			create: true
		});
	});
</script>

@endsection