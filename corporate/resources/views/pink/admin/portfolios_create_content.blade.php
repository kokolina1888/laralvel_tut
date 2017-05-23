<div id="content-page" class="content group">
	<div class="hentry group">

		{!! Form::open(['url' => (isset($portfolio->id)) ? route('portfolios.update',['portfolios'=>$portfolio->alias]) : route('portfolios.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

		<ul>
			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Name:</span>
					<p>
						<span class="sublabel">Title</span>
					</p>
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('title',isset($portfolio->title) ? $portfolio->title  : old('title'), ['placeholder'=>'Enter portfolio title']) !!}
				</div>
			</li>
			<!-- portfolio text -->
			<li class="textarea-field">
				<label for="message-contact-us">
					<span class="label">Portfolio Text:</span>

					<p><span class="label">Description:</span></p>
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
					{!! Form::textarea('text', isset($portfolio->text) ? $portfolio->text  : old('text'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Enter portfolio text']) !!}
				</div>
				<div class="msg-error"></div>
			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Customer:</span>
					<br />
					<span class="sublabel">Enter customer</span><br />
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('customer', isset($portfolio->customer) ? $portfolio->customer  : old('customer'), ['placeholder'=>'Enter portfolio customer']) !!}
				</div>
			</li>
			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Alias:</span>
					<br />
					<span class="sublabel">Enter alias</span><br />
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('alias', isset($portfolio->alias) ? $portfolio->alias  : old('alias'), ['placeholder'=>'Enter portfolio alias']) !!}
				</div>
			</li>

			
			
			@if(isset($portfolio->img->path))
			<li class="textarea-field">
				
				<label>
					<span class="label">Portfolio image:</span>
				</label>
				
				{{ Html::image(asset(env('THEME')).'/images/projects/'.$portfolio->img->path,'',['style'=>'width:400px']) }}
				{!! Form::hidden('old_image',$portfolio->img->path) !!}
				{!! Form::hidden('id',$portfolio->id) !!}

			</li>
			@endif


			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Image:</span>
					<br />
					<span class="sublabel">Portfolio Image</span><br />
				</label>
				<div class="input-prepend">
					{!! Form::file('image', ['class' => 'filestyle','data-buttonText'=>'Choose image','data-buttonName'=>"btn-primary",'data-placeholder'=>"No File"]) !!}
				</div>

			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Filter:</span>
					<br />
					<span class="sublabel">Portfolio filter</span><br />
				</label>
				<div class="input-prepend">
					{!! Form::select('filter_alias', $filters, ['placeholder' => 'Pick a filter...']) !!}
				</div>

			</li>	 
<!-- for update portfolio -->
			@if(isset($portfolio->id))
			<input type="hidden" name="_method" value="PUT">		

			@endif

			<li class="submit-button"> 
				{!! Form::button((isset($portfolio->id))?'Update':'Save', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}			
			</li>


		</ul>

		{!! Form::close() !!}

		<script>
			CKEDITOR.replace( 'editor' );
			
		</script>
	</div>
</div>	