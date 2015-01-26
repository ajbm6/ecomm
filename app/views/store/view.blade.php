@extends('layouts.base')

@section('title')
	{{ $product->title }} | {{ Company::$name }}
@stop

@section('content')
	<div id="product-image">
		<img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
	</div><!-- end product-image -->
	<div id="product-details">
		<h1>{{ $product->title }}</h1>
		<p>{{ $product->description }}</p>

		<hr>

		<form action="{{ URL::to('store/addtocart') }}" method="post">
			<label for="quantity">Qty:</label>
			<input type="number" id="quantity" name="quantity" value="1" min="1" max="99" autocomplete="off">
			<input type="hidden" name="id" value="{{ $product->id }}">

			<button type="submit" class="secondary-cart-btn">
				<img src="{{ asset('img/white-cart.gif') }}">
				ADD TO CART
			</button>
			{{ Form::token() }}
		</form>
	</div><!-- end product-details -->
	<div id="product-info">
		<p class="price">&#8369;{{ $product->price }}</p>
		<p>Availability: <span>{{ Availability::display($product->quantity) }}</span></p>
		<p>Product Code: <span>{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</span></p>
	</div><!-- end product-info -->
@stop