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
<div style="margin: 50px">
	@if($portfolios)
	<table class="table table-hover">
		<thead>
			<th>No</th>
			<th>Name</th>
			<th>Tag</th>
			<th>Image</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Delete</th>
		</thead>
		<!-- Portfolio Item -->

		<tbody>
			@foreach($portfolios as $k=>$portfolio)
			<tr>
				<td>{{$k+1}}</td>
				<td>{!! Html::link(route('portfolio.edit', ['id'=>$portfolio->id]), $portfolio->name, ['alt'=>$portfolio->name])!!}
				</td>
				<td>{{$portfolio->filter->name}}</td>
				<td>
					<div class="portfolio_img" style="width: 250px"> 
						{{ Html::image('assets/user_img/'.$portfolio->images, $portfolio->name)}} 
					</div>   
				</td>
				<td>{{$portfolio->created_at->diffForHumans()}}</td>
				<td>
					@if($portfolio->updated_at)
					{{$portfolio->updated_at->diffForHumans()}}
					@endif
				</td>
				<td>
					{!! Form::open(['url'=>route('portfolio.destroy',['id'=>$portfolio->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
					{{ method_field('DELETE') }}


					{!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}

					{!! Form::close() !!}

				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	{!! Html::link(route('portfolio.create'), "New Portfolio", ['class'=>'btn btn-info']) !!}
</div>
@endsection