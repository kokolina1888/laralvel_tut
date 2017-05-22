<div id="content-page" class="content group">
	<div class="hentry group">

		{!! Form::open(['url' => (isset($menu->id)) ? route('menus.update',['menus'=>$menu->id]) : route('menus.store'),'class'=>'contact-form','method'=>'POST','enctype'=>'multipart/form-data']) !!}

		<ul>

			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Title:</span>
					<br />
					<span class="sublabel">Link Title</span><br />
				</label>
				<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
					{!! Form::text('title',isset($menu->title) ? $menu->title  : old('title'), ['placeholder'=>'Link title']) !!}
				</div>
			</li>


			<li class="text-field">
				<label for="name-contact-us">
					<span class="label">Parent link item:</span>
					<br />
					<span class="sublabel">Parent:</span><br />
				</label>
				<div class="input-prepend">
					{!! Form::select('parent', $menus, isset($menu->parent) ? $menu->parent : null) !!}
				</div>

			</li>
		</ul>	
		
		<h1">Тип меню:</h1>
		
		<div id="accordion">

			<h3>{!! Form::radio('type', 'customLink',(isset($type) && $type == 'customLink') ? TRUE : FALSE,['class' => 'radioMenu']) !!}	
				<span class="label">User link:</span></h3>

				<ul>

					<li class="text-field">
						<label for="name-contact-us">
							<span class="label">Url:</span>
							<br />
							<span class="sublabel">url</span><br />
						</label>
						<div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
							{!! Form::text('custom_link',(isset($menu->path) && $type=='customLink') ? $menu->path  : old('custom_link'), ['placeholder'=>'url']) !!}
						</div>
					</li>
					<div style="clear: both;"></div>
				</ul>


				<h3>{!! Form::radio('type', 'blogLink',(isset($type) && $type == 'blogLink') ? TRUE : FALSE,['class' => 'radioMenu']) !!}	
					<span class="label">Blog:</span></h3>

					<ul>

						<li class="text-field">
							<label for="name-contact-us">
								<span class="label">Blog category:</span>
								<br />
								<span class="sublabel">Blog Category</span><br />
							</label>
							<div class="input-prepend">

								@if($categories)
								{!! Form::select('category_alias',$categories,(isset($option) && $option) ? $option :FALSE) !!}
								@endif
							</div>
						</li>


						<li class="text-field">
							<label for="name-contact-us">
								<span class="label">Link to blog item:</span>
								<br />
								<span class="sublabel">Link to blog item</span><br />
							</label>
							<div class="input-prepend">
								{!! Form::select('article_alias', $articles, (isset($option) && $option) ? $option :FALSE, ['placeholder' => 'Not in use']) !!}

							</div>

						</li>	 
						<div style="clear: both;"></div>
					</ul>



					<h3>{!! Form::radio('type', 'portfolioLink',(isset($type) && $type == 'portfolioLink') ? TRUE : FALSE,['class' => 'radioMenu']) !!}	
						<span class="label">Portfolio:</span></h3>

						<ul>

							<li class="text-field">
								<label for="name-contact-us">
									<span class="label">Link to portfolio item:</span>
									<br />
									<span class="sublabel">Link to portfolio item</span><br />
								</label>
								<div class="input-prepend">
									{!! Form::select('portfolio_alias', $portfolios, (isset($option) && $option) ? $option :FALSE, ['placeholder' => 'Not in use']) !!}

								</div>

							</li>

							<li class="text-field">
								<label for="name-contact-us">
									<span class="label">Portfolio:</span>
									<br />
									<span class="sublabel">Portfolio</span><br />
								</label>
								<div class="input-prepend">
									{!! Form::select('filter_alias', $filters, (isset($option) && $option) ? $option :FALSE, ['placeholder' => 'Not in use']) !!}

								</div>

							</li>


						</ul>



					</div>

					<br />

					@if(isset($menu->id))
					<input type="hidden" name="_method" value="PUT">		

					@endif
					<ul>
						<li class="submit-button"> 
							{!! Form::button('Save', ['class' => 'btn btn-the-salmon-dance-3','type'=>'submit']) !!}			
						</li>	
					</ul>







					{!! Form::close() !!}


				</div>
			</div>
			<script>
	
	jQuery(function($) {
		
		$('#accordion').accordion({
			
			activate: function(e, obj) {
				obj.newPanel.prev().find('input[type=radio]').attr('checked','checked');
			}
				
		});
		
		var active = 0;
		$('#accordion input[type=radio]').each(function(ind,it) {
			
			if($(this).prop('checked')) {
				active = ind;
			}
			
		});
		
		$('#accordion').accordion('option','active', active);
		
	});
	
</script>