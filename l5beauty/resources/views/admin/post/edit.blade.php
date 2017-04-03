@extends('admin.layout')

@section('styles')
<link rel="stylesheet" type="text/css" href="/assets/pickadate/themes/default.css">
<link rel="stylesheet" type="text/css" href="/assets/pickadate/themes/default.css.date.css">
<link rel="stylesheet" type="text/css" href="/assets/pickadate/themes/default.time.css">
<link rel="stylesheet" type="text/css" href="/assets/selectize/css/selectize.css">
<link rel="stylesheet" type="text/css" href="/assets/selectize/css/selectize.bootstrap3.css">
@endsection

@section('content')
<div class="container-fluid">
	<div class="row page-title-row">
		<div class="col-md-12">
			<h3>
				Post <small>&raquo; Edit Post</small>
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Post Edit Form
					</h3>
				</div>
				<div class="panel-body">
					@include('admin.partials.errors')
					@include('admin.partials.success')
					<form action="{{ route('post.update', $data['id'])}}" role="form" method="POST" class="form-horizontal">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="_method" value="PUT">
						
						@include('admin.post._form')

						<div class="col-md-8">
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<button type="submit" class="btn btn-primary btn-lg" name="action" value="continue">
										<i class="fa fa-floppy-o">
											
										</i>
										Save - Continue
									</button>
									<button type="submit" class="btn btn-success btn-lg" name="action" value="finished">
										<i class="fa fa-floppy-o">
											
										</i>
										Save - Finished
									</button>
									<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modal-delete">
										<i class="fa fa-times-circle">
											
										</i>
										Delete
									</button>
								</div>
							</div>
						</div>

					</form>

				</div>
			</div>
		</div>
	</div>

	{{-- Confirm Delete --}}
	<div class="modal fade" id="modal-delete" tabindex="1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal">
						&times;
					</button>
					<h4 class="modal-title">
						Please Confirm
					</h4>
				</div>
				<div class="modal-body">
					<p class="lead">
						<i class="fa fa-question-circle fa-lg">
							
						</i>
						&nbsp;
						Are you sure you want to delete this post?
					</p>
				</div>
				<div class="modal-footer">
					<form method="POST" action="{{ route('post.destroy', $data['id'])}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="_method" value="DELETE">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-danger">
							<i class="fa fa-times-circle">

							</i>
							Yes
						</button>
						
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
