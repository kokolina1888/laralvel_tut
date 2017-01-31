{!! Form::open(['route'		=>'admin.products.store',
				'class'		=>'form',
				'novalidate'=>'novalidate',
				'files' 	=> TRUE]) !!}

<div class="form-group">
	{!! Form::label('Product Name') !!}
	{!! Form::text('name', null, ['placeholder'=>'Chess Board', 'class'=>'form-control'] ) !!}	
</div>

<div class="form-group">
	{!! Form::label('SKU') !!}
	{!! Form::text('sku', null, ['placeholder'=>'1234', 'class'=>'form-control'] ) !!}	
</div>

<div class="form-group">
	{!! Form::label('Product Image') !!}
	{!! Form::file('image', null) !!}	
</div>

<div class="form-group">
	{!! Form::submit('Create Product', ['class'=>'btn btn-primary']) !!}	
</div>

{!! Form::close()!!}