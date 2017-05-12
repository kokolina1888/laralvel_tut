@if($articles)
	<div id="content-page" class="content group">
				            <div class="hentry group">
				                <h2>Add Article</h2>
				                <div class="short-table white">
				                    <table style="width: 100%" cellspacing="0" cellpadding="0">
				                        <thead>
				                            <tr>
				                                <th class="align-left">ID</th>
				                                <th>Title</th>
				                                <th>Text</th>
				                                <th>Image</th>
				                                <th>Category</th>
				                                <th>Aload</th>
				                                <th>Action</th>
				                            </tr>
				                        </thead>
				                        <tbody>
				                            
											@foreach($articles as $article)
											<tr>
				                                <td class="align-left">{{$article->id}}</td>
				                                <td class="align-left">{!! Html::link(route('articles.edit',['articles'=>$article->alias]),$article->title) !!}</td>
				                                <td class="align-left">{{str_limit($article->text,200)}}</td>
				                                <td>
													@if(isset($article->img->mini))
													{!! Html::image(asset(env('THEME')).'/images/articles/'.$article->img->mini) !!}
													@endif
												</td>
				                                <td>{{$article->category->title}}</td>
				                                <td>{{$article->alias}}</td>
				                                <td>
												{!! Form::open(['url' => route('articles.destroy',['articles'=>$article->alias]),'class'=>'form-horizontal','method'=>'POST']) !!}
												    {{ method_field('DELETE') }}
												    {!! Form::button('Delete', ['class' => 'btn btn-french-5','type'=>'submit']) !!}
												{!! Form::close() !!}
												</td>
											 </tr>	
											@endforeach	
				                           
				                        </tbody>
				                    </table>
				                </div>
								
								{!! HTML::link(route('articles.create'),'Add Article',['class' => 'btn btn-the-salmon-dance-3']) !!}
                                
				                
				            </div>
				            <!-- START COMMENTS -->
				            <div id="comments">
				            </div>
				            <!-- END COMMENTS -->
				        </div>
@endif