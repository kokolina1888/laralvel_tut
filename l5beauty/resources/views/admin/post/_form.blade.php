<div class="row">
	<div class="col-md-8">
		<div class="form-group">
			<label for="title" class="col-md-2 control-label">
				Title
			</label>
			<div class="col-md-10">
				<input type="text"  class="form-control" name="title" autofocus id="title" value= "{{ $data['title'] }}">
			</div>
		</div>
		<div class="form-group">
			<label for="subtitle" class="col-md-2 control-label">
				Subtitle
			</label>
			<div class="col-md-10">
				<input type="text" name="subtitle"  class="form-control" autofocus id="subtitle" value="{{ $data['subtitle'] }}">
			</div>
		</div>
		<div class="form-group">
			<label for="page_image" class="col-md-2 control-label">
				Page Image
			</label>
			<div class="col-md-10">
				<div class="row">
					<div class="col-md-8">
						<input type="text" name="page_image" onchange="handle_image_change()"  class="form-control" alt="Image Thumbnail" id="page_image" value="{{ $data['page_image'] }}">
					</div>
					<script type="text/javascript">
						function handle_image_change(){
							$('#page_image-preview').attr('src', function(){
								var value = $('#page_image').val();
								if(! value){
									value = json_encode(config('blog.page_image'));

									if(value === null){
										value = '';
									}
								}
								if(value.substr(0, 4) != 'http' && value.substr(0,1) != '/') {
									value = json_encode(config('blog.uploads.webpath')) + '/' + value;
								}

								return value;
							});
						}
					</script>
					<div class="visible-sm space-10"></div>

					<div class="col-md-4 text-right">
						<img src="{{ page_image($data['page_image'])}}" alt="" class="img img_responsive" id="page-image-preview" style="max-height: 40px">
					</div>

				</div>
			</div>
		</div>

		<div class="form-group">

			<label for="content" class="col-md-2 control-label">
				Content
			</label>
			<div class="col-md-10">
				<textarea name="content" id="content" rows="10" class="form-control">
					{{ $data['content'] }}
				</textarea>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label for="publish_date" class="col-md-3 control-label">
				Pub Date
			</label>
			<div class="col-md-8">
				<input type="text" name="publish_date" class="form-control" id="publish_date" value="{{ $data['publish_date'] }}">
			</div>
		</div>

		<div class="form-group">
			<label for="publish_time" class="col-md-3 control-label">
				Pub Time
			</label>
			<div class="col-md-8">
				<input type="text"  class="form-control" name="publish_time" id="publish_time" value="{{ $data['publish_time'] }}">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-8 col-md-offset-3">
				<div class="checkbox">
					<label>
						<input 
						<?php 

						if($data['is_draft']) 
						echo 'checked';
						
						?>
						type="checkbox" name="is_draft">
						Draft?
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="tags" class="col-md-3 control-label">
				Tags
			</label>
			<div class="col-md-8">
				<select name="tags[]" id="tags" class="form-control" multiple>

					@foreach($data['allTags'] as $id=>$tag)

					<option value="{{$id}}">
						{{$tag}}
					</option>
					@endforeach
					
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="layout" class="col-md-3 control-label">
				Layout
			</label>
			<div class="col-md-8">
				<input type="text" name="layout" id="layout"  class="form-control" value="{{ $data['layout'] }}">
			</div>
		</div>
		<div class="form-group">
			<label for="meta_description" class="col-md-3 control-label">
				Meta 	
			</label>
			<div class="col-md-8">
				<textarea name="meta_description" id="meta_description" class="form-control">
					{{ $data['meta_description'] }}
				</textarea>
			</div>
		</div>
	</div>
</div>