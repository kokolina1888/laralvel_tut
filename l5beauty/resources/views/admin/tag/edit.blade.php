@extends('admin.layout')

@section('content')
<div class="container-fluid">
	<div class="row page-title-row">
		<div class="col-md-12">
			<h3>
				Tags <small>&raquo; Edit Tag</small>
			</h3>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
								Tag Edit Form
							</h3>
						</div>
						<div class="panel-body">
							@include('admin.partials.errors')
							@include('admin.partials.success')
							<form action="/admin/tag/{{ $id }}" role="form" method="POST" class="form-horizontal">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="hidden" name="_method" value="PUT">
								<input type="hidden" name="id" value="{{ $id }}">


								<div class="form-group">
									<label for="tag" class="col-md-3 control-label">Tag</label>
									<div class="col-md-3">
										<p class="form-control-static">
											{{ $tag }}
										</p>
									</div>
								</div>

								@include('admin.tag._form')
								<div class="form-group">
									<div class="col-md-7 col-md-offset-3">

										<button type="submit" class="btn btn-primary btn-md">
											<i class="fa fa-plus-circle"></i>&nbsp; 
											Save Changes
										</button>
										<button type="button" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-md">
											<i class="fa fa-times-circle"></i>&nbsp; 
											Delete
										</button>
									</div>
								</div>
							</form>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- Confirm Delete --}}

<div class="modal fade" id="modal-delete" tabindex="-1">
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
					Are you sure you want to delete this tag?
				</p>
			</div>
			<div class="modal-footer">
				<form action="/admin/tag/{{ $id }}" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="hidden" name="_method" value="DELETE">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Close
					</button>
					<button type="submit" class="btn btn-danger">
						<i class="fa fa-times-circle"></i>
						Yes
					</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection