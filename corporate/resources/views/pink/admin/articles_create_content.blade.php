<div id="content-page" class="content group">
	<div class="hentry group">

		{!! Form::open(['url' => (isset($article->id)) ? route('articles.update',['articles'=>$article->alias]) : route('articles.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

		<ul>
			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Name:</span>
					<br />
					<span class="sublabel">Title</span><br />
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('title',isset($article->title) ? $article->title  : old('title'), ['placeholder'=>'Enter page name']) !!}
				</div>
			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Key words:</span>
					<br />
					<span class="sublabel">Article Title</span><br />
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('keywords', isset($article->keywords) ? $article->keywords  : old('keywords'), ['placeholder'=>'Enter page name']) !!}
				</div>
			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Meta desc:</span>
					<br />
					<span class="sublabel">Article Title</span><br />
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('meta_desc', isset($article->meta_desc) ? $article->meta_desc  : old('meta_desc'), ['placeholder'=>'Enter page name']) !!}
				</div>
			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Alias:</span>
					<br />
					<span class="sublabel">Enter alias</span><br />
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('alias', isset($article->alias) ? $article->alias  : old('alias'), ['placeholder'=>'Enter page alias']) !!}
				</div>
			</li>

			<li class="textarea-field">
				<label for="message-contact-us">
					<span class="label">Short Description:</span>
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
					{!! Form::textarea('desc', isset($article->desc) ? $article->desc  : old('desc'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Enter Page Text']) !!}
				</div>
				<div class="msg-error"></div>
			</li>

			<li class="textarea-field">
				<label for="message-contact-us">
					<span class="label">Description:</span>
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
					{!! Form::textarea('text', isset($article->text) ? $article->text  : old('text'), ['id'=>'editor2','class' => 'form-control','placeholder'=>'Enter page text']) !!}
				</div>
				<div class="msg-error"></div>
			</li>

			@if(isset($article->img->path))
			<li class="textarea-field">
				
				<label>
					<span class="label">Page image:</span>
				</label>
				
				{{ HTML::image(asset(env('THEME')).'/images/articles/'.$article->img->path,'',['style'=>'width:400px']) }}
				{!! Form::hidden('old_image',$article->img->path) !!}

			</li>
			@endif


			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Image:</span>
					<br />
					<span class="sublabel">Page Image</span><br />
				</label>
				<div class="input-prepend">
					{!! Form::file('image', ['class' => 'filestyle','data-buttonText'=>'Choose image','data-buttonName'=>"btn-primary",'data-placeholder'=>"No File"]) !!}
				</div>

			</li>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Category:</span>
					<br />
					<span class="sublabel">Article category</span><br />
				</label>
				<div class="input-prepend">


					{!! Form::select('category_id', $categories, ['placeholder' => 'Pick a size...']) !!}
				</div>

			</li>	 

			@if(isset($article->id))
			<input type="hidden" name="_method" value="PUT">		

			@endif

			<li class="submit-button"> 
				{!! Form::button('Save', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}			
			</li>

		</ul>





		{!! Form::close() !!}

		<script>
			CKEDITOR.replace( 'editor' );
			CKEDITOR.replace( 'editor2' );
		</script>
	</div>
</div>