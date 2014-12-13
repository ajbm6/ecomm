@extends('layouts.base')

@section('search-keyword')
	<hr>

	<section id="search-keyword">
		<h1>Search Results for <span>"{{ $keyword }}"</span></h1>
	</section><!-- end search-keyword -->
@stop

@section('content')
	<div id="search-results">
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
	</div><!-- end search-results -->
@stop