@extends('layouts.base')

@section('promo')
	<section id="promo">
		<div id="promo-details">
			<h1>Today's Deals</h1>
			<p>Checkout this section of<br>products at a discounted price.</p>
			<a href="#" class="default-btn">Shop Now</a>
		</div><!-- end promo-details -->
		<img src="{{ asset('img/promo.png') }}" alt="Promotional Ad">
	</section><!-- promo -->
@stop

@section('content')
	<h2>New Products</h2>
	<hr>
	<div id="products">
		@foreach($products as $product)
			<div class="product">
				<a href="{{ URL::to('/store/view/'.$product->id) }}">
					<img src="{{ asset($product->image) }}" alt="Product" class="feature" style="width:240px;height:127px;">
				</a>

				<h3><a href="{{ URL::to('/store/view/'.$product->id) }}">{{ $product->title }}</a></h3>

				<p>{{ $product->description }}</p>

				<h5>Availability: <span class="instock">In Stock</span></h5>

				<p>
					<a href="#" class="cart-btn">
						<span class="price">P{{ $product->price }}</span>
						<img src="img/white-cart.gif" alt="Add to Cart">
						ADD TO CART
					</a>
				</p>
			</div>
		@endforeach
	</div><!-- end products -->
@stop