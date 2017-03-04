@extends('layouts.backend')
@section('title', $page->exists ? 'Editing' . $page->title : 'Create New Page')
@section('content')
{!! Form::model($page, [
	'method' => $page->exists ? 'put' : 'post',
	'route'	=> $page->exists ? ['pages.update', $page->id] : ['pages.store']
	])!!}
	<div class="form-group">
		{!! Form::label('title') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('url', 'URI') !!}
		{!! Form::text('url', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('name') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
		<p class="help-block">
			This name is used to generate links to the page.
		</p>
	</div>
	<div class="form-group row">
		<div class="col-md-12">{!! Form::label('template') !!}</div>
		<div class="col-md-4"> {!! Form::select('template', $templates, null, ['class' => 'form-control'])!!}</div>
	</div>

	<div class="form-group row">
		<div class="col-md-12">{!! Form::label('order') !!}</div>
		<div class="col-md-2">{!! Form::select('order', [''=>'',
															'before'=>'Before',
															'after'=>'After',
															'childOf'=> 'Child Of']) !!}</div>
				
		<div class="col-md-5"> 
<select name="orderPage" class="form-control">
<option value=""></option>
	
	@foreach($pages as $page){

	<option value="{!!$page->id!!}">{!! $page->present()->paddedTitle!!}</option>
	}
	@endforeach
</select>

 
		</div>
 
	</div>

	<div class="form-group">
		{!! Form::label('content') !!}
		{!! Form::textarea('content', null, ['class' => 'form-control']) !!}
	</div>
	<div class="checkbox">
	 <label>
	 	{!! Form::checkbox('hidden') !!}
	 	Hide page from navigation
	 	<span class="help-block">
	 		Checking this will hide the page from navigation
	 	</span>
	 </label>
</div>	

	
	{!! Form::submit($page->exists ? 'Save Page' : 'Create New Page', ['class' => 'btn btn-primary'])!!}

	{!! Form::close() !!}
	<script type="text/javascript">
		new SimpleMDE().render();
	</script>
	@endsection