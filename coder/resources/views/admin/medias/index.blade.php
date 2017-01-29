@extends('layouts.admin')
@section('content')

<div class="col-sm-6">
	<table class="table">
		<thead>
			<th>name</th>
			<th>Created data</th>
			<th></th>
		</thead>
		<tbody>
			@foreach($photos as $photo)
			<tr>
				<td>

				<img src="{{url($photo->file)}}" alt="" height="100">

				</td>
				<td>{{$photo->created_at->diffForHumans()}}</td>
				<td><a href="{{route('medias.edit', ['photo_id'=>$photo->id, 'auth_user'=>Auth::user()->name])}}">Edit Media</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection