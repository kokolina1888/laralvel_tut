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
	@if($peoples)
	<table class="table table-hover">
		<thead>
			<th>No</th>
			<th>Name</th>
			<th>Position</th>
			<th>Image</th>
			<th>Text</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Delete</th>
		</thead>
		<tbody>
			@foreach($peoples as $k=>$people)
			<tr>
				<td>{{$k+1}}</td>
				<td>{!! Html::link(route('team.edit', ['people'=>$people->id]), $people->name, ['alt'=>$people->name])!!}
				</td>
				<td>{{$people->position}}</td>
				<td>
					{!! Html::image('assets/user_img/'.$people['images'],'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}
				</td>
				<td>{{$people->text}}</td>
				<td>
					@if($people->created_at)
					{{$people->created_at->diffForHumans()}}
					@endif
				</td>

				<td>
					@if($people->updated_at)
					{{$people->updated_at->diffForHumans()}}
					@endif
				</td>
				<td>
					{!! Form::open(['url'=>route('team.destroy',['people'=>$people->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
					{{ method_field('DELETE') }}					
					{!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	{!! Html::link(route('team.create'), "New Team Member") !!}
</div>
@endsection