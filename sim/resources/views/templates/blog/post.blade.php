<article>
<h2> 
{{ $post->title }}
</h2>
<p>
Posted by {{ $post->author->name }} on {{ $post->published_date }}
</p>
{!! Markdown::convertToHtml($post->excerpt);!!}
			{!! Markdown::convertToHtml($post->body);!!}
</article>