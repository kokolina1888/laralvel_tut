<p>
	Yoy have received a message from your website contact form
</p>

<p>
	Here are the details
</p>
<ul>
	<li>
		Name: 
		<strong>
			{{$name}}
		</strong>
	</li>
	<li>
		Email:
		<strong>
			{{$email}}
		</strong>
	</li>
	<li>
		Phone: 
		<strong>
			{{$phone}}
		</strong>
	</li>
</ul>
<p>
	@foreach($messageLines as $messageLine)
	<p>
		{{ $messageLine }}
	</p>
	@endforeach
</p>