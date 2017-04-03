@extends('app')
@section('content')
@if(count($products)>0)
<h2>Product Catalog</h2>
<ul>
@foreach($products as $product)
<li>{{$product->name}}
<a href="{{ route('catalog.show', $product->id) }}">View Product</a>
</li>
@endforeach
</ul>
@else 
<p>Nothing to display</p>
@endif
@endsection