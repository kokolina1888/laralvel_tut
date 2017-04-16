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
	@if($users)
	<table class="table table-hover">
		<thead>
			<th>No</th>
			<th>email</th>
			<th>role</th>
			<th>Created At</th>
			<th>Updated At</th>
			<th>Delete</th>
		</thead>
		<tbody>
			@foreach($users as $k=>$user)
			<tr>
				<td>{{$k+1}}</td>
				<td>{!! Html::link(route('users.edit', ['id'=>$user->id]), $user->email, ['alt'=>$user->email])!!}
				</td>

				<td>
					{{ $user->role }}
				</td>
				<td>
					{{ $user->created_at->diffForHumans()}}
				</td>
				<td>
					@if($user->updated_at)
					{{ $user->created_at->diffForHumans()}}
					@endif
				</td>				
				<td>
					{!! Form::open(['url'=>route('users.destroy',['id'=>$user->id]), 'class'=>'form-horizontal','method' => 'POST']) !!}
					{{ method_field('DELETE') }}

					
					{!! Form::button('Delete',['class'=>'btn btn-danger','type'=>'submit']) !!}

					{!! Form::close() !!}

				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
	
</div>
@endsection