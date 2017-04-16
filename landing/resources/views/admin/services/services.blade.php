@extends('admin.index')
@section('content')

@if(Session::has('status'))
<div class="alert alert-success">
	<button class="close" type="button" data-dismiss="alert">&times;</button>
	<strong>
		<i class="fa fa-check-circle fa-lg fa-fw"></i>Success. &nbsp;
	</strong>
	{{ Session::get('status') }}
</div>
@endif
<div style="margin: 0 50 0 50">
	@if($services)
	<table class="table table-hover">
		<thead>
			<th>No</th>
			<th>Name</th>
			<th>Icon</th>
			<th>Text</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Delete</th>
		</thead>
		<tbody>
			@foreach($services as $k=>$service)
			<tr>
				<td>{{$k+1}}</td>
				<td>{!! Html::link(route('service.edit', ['id'=>$service->id]), $service->name, ['alt'=>$service->name])!!}
				</td>

				<td><div class="service_icon"> <span style="margin-left: 27px"><i class="fa {{ $service->icon}}" aria-hidden="true"></i></span> </div></td>
				<td>{{$service->text}}</td>
				<td>{{$service->created_at->diffForHumans()}}</td>
				<td>
					@if($service->updated_at)
					{{$service->updated_at->diffForHumans()}}
					@endif
				</td>
				<td>
					{!! Form::open(['url'=>route('service.destroy',['id'=>$service->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
					{{ method_field('DELETE') }}

					
					{!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}

					{!! Form::close() !!}

				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	{!! Html::link(route('service.create'), "New Page") !!}
</div>
@endsection