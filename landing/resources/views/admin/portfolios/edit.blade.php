@extends('admin.index')
@section('content')
<div class="wrapper container-fluid">
@if(count($errors)>0)
            <div class="alert alert-danger">

              <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
           
{!!Form::model($portfolio, ['method'=>'PATCH', 'class'=>'form-horizontal', 'action' => ['PortfoliosController@update', $portfolio->id], 'files'=>true])!!}
	    <div class="form-group">
    	{!! Form::hidden('id', $portfolio->id) !!}
	     {!! Form::label('name', 'Name:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
		 	{!! Form::text('name', $portfolio->name, ['class' => 'form-control']) !!}
		 </div>
    </div>
   
    <div class="form-group">
	     {!! Form::label('filter_id', 'Tag:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
		 	{!! Form::select('filter_id', ['' => 'options'] + $tags, $portfolio->filter_id, ['class' => 'form-control']) !!}
		 </div>
    </div>
    
      
    <div class="form-group">
    	{!! Form::label('old_images', 'Image:',['class'=>'col-xs-2 control-label']) !!}
    	<div class="col-xs-offset-2 col-xs-10">
			{!! Html::image('assets/user_img/'.$portfolio->images,'',['class'=>'img-circle img-responsive','width'=>'150px']) !!}
			{!! Form::hidden('old_images', $portfolio->images) !!}
    	</div>
    </div>
    
    <div class="form-group">
	     {!! Form::label('images', 'Image:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
		 	{!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Choose image','data-buttonName'=>"btn-primary",'data-placeholder'=>"No file selected"]) !!}
		 </div>
    </div>
    

    
      <div class="form-group">
	    <div class="col-xs-offset-2 col-xs-10">
	      {!! Form::button('Save', ['class' => 'btn btn-primary','type'=>'submit']) !!}
	    </div>
	  </div>
    
{!! Form::close() !!}

 <script>
	CKEDITOR.replace( 'editor' );
</script>
</div>
@endsection