@extends('layouts.base')

@section('content')
	<div id="product-image">
		<img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
	</div><!-- end product-image -->
	<div id="product-details">
		<h1>{{ $product->title }}</h1>
		<p>{{ $product->description }}</p>

		<hr>

		<form action="#" method="post">
			<label for="qty">Qty:</label>
			<input type="text" id="qty" name="qty" value="1" maxlength="2">

			<button type="submit" class="secondary-cart-btn">
				<img src="{{ asset('img/white-cart.gif') }}">
				ADD TO CART
			</button>
		</form>
	</div><!-- end product-details -->
	<div id="product-info">
		<p class="price">P{{ $product->price }}</p>
		<p>Availability: <span>{{ Availability::display($product->availability) }}</span></p>
		<p>Product Code: <span>{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</span></p>
	</div><!-- end product-info -->
@stop