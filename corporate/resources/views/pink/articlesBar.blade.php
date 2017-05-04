  	<div class="widget-first widget recent-posts">
  		<h3>Recent Posts</h3>
  		<div class="recent-post group">
  			@if(!$portfolios->isEmpty())
  			@foreach($portfolios as $portfolio)

  			<div class="hentry-post group">
  				<div class="thumb-img"><img src="{{ asset(env('THEME'))}}/images/projects/{{ $portfolio->img->mini }}" width="55" alt="001" title="001" /></div>
  				<div class="text">
  					<a href="{{ route('portfolios.show', ['alias'=>$portfolio->alias])}}" title="{{ $portfolio->title }}" class="title">Section shortcodes &amp; sticky posts!</a>
  					<p>{{ str_limit($portfolio->text, 130)}}</p>
  					<a class="read-more" href="{{ route('portfolios.show', ['alias'=>$portfolio->alias])}}">&rarr; Read More</a>
  				</div>
  				
  			</div>
  			@endforeach
  			@endif
      </div>
    </div>
    
    
    <div class="widget-last widget recent-comments">
      @if(!$comments->isEmpty())

      <h3>Recent Comments</h3>
      <div class="recent-post recent-comments group">
       @foreach($comments as $comment)
       <div class="the-post group">
        <div class="avatar">
          @set($hash, ($comment->email)?md5($comment->email):$comment->user->email)
          <img alt="" src="https://gravatar.com/avatar/{{$hash}}?d=mm&s=55" class="avatar" />   
        </div>
        <span class="author"><strong><a href="#">{{ isset($comment->user)?$comment->user->name:$comment->name}}</a></strong> in</span> 
        <a class="title" href="{{ route('articles.show', ['alias'=>$comment->article->alias])}}">{{ $comment->article->title}}</a>
        <p class="comment">
         {{ $comment->text}} <a class="goto" href="{{ route('articles.show', ['alias'=>$comment->article->alias])}}">&#187;</a>
       </p>
     </div>
     @endforeach
   </div>
   @endif
 </div>
