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

			<h5>
				Availability:
				<span class="{{ Availability::cssClass($product->availability) }}">
					{{ Availability::display($product->availability) }}
				</span>
			</h5>

			<p>
				<form method="post" action="{{ URL::to('store/addtocart') }}">
					<input type="hidden" name="quantity" value="1">
					<input type="hidden" name="id" value="{{ $product->id }}">
					<button type="submit" class="cart-btn">
						<span class="price">P{{ $product->price }}</span>
						<img src="{{ asset('img/white-cart.gif') }}">
						ADD TO CART
					</button>
					{{ Form::token() }}
				</form>
			</p>
		</div>
	@endforeach
	</div><!-- end products -->
@stop