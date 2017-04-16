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
	@if($pages)
	<table class="table table-hover">
		<thead>
			<th>No</th>
			<th>Name</th>
			<th>Alias</th>
			<th>Text</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Delete</th>
		</thead>
		<tbody>
			@foreach($pages as $k=>$page)
			<tr>
				<td>{{$k+1}}</td>
				<td>{!! Html::link(route('pages.edit', ['page'=>$page->id]), $page->name, ['alt'=>$page->name])!!}
				</td>
				<td>{{$page->alias}}</td>
				<td>{{$page->text}}</td>
				<td>{{$page->created_at->diffForHumans()}}</td>
				<td>
					@if($page->updated_at)
					{{$page->updated_at->diffForHumans()}}
					@endif
				</td>
				<td>
					{!! Form::open(['url'=>route('pages.destroy',['page'=>$page->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
					{{ method_field('DELETE') }}

					
					{!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}

					{!! Form::close() !!}

				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	{!! Html::link(route('pages.create'), "New Page") !!}
</div>
@endsection