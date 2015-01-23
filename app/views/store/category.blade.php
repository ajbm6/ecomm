@extends('layouts.base')

@section('promo')
	<section id="promo-alt">
		<div id="promo1">
			<h1>The brand new MacBook Pro</h1>
			<p>With a special price, <span class="bold">today only!</span></p>
			<a href="#" class="secondary-btn">READ MORE</a>
			<img src="{{ asset('img/macbook.png') }}" alt="MacBook Pro">
			<img src="{{ asset('img/macbook.png') }}" alt="MacBook Pro">
		</div><!-- end promo1 -->
		<div id="promo2">
			<h2>The iPhone 5 is now<br>available in our store!</h2>
			<a href="">Read more <img src="{{ asset('img/right-arrow.gif') }}" alt="Read more"></a>
			<img src="{{ asset('img/iphone.png') }}" alt="iPhone">
		</div><!-- end promo2 -->
		<div id="promo3">
			<img src="{{ asset('img/thunderbolt.png') }}" alt="Thunderbolt">
			<h2>The 27"<br>Thunderbolt Display.<br>Simply Stunning.</h2>
			<a href="#">Read more <img src="{{ asset('img/right-arrow.gif') }}" alt="Read more" /></a>
		</div><!-- end promo3 -->
	</section><!-- promo-alt -->
@stop

@section('content')
	<h2>{{ $category->name }}</h2>
	<hr>

	<aside id="categories-menu">
		<h3>CATEGORIES</h3>
		<ul>
		@foreach($catnav as $cat)
			@if(!$cat->isEmpty())
				<li><a href="{{ URL::to('/store/category/'.$cat->id) }}">{{ $cat->name }}</a></li>
			@endif
		@endforeach
		</ul>
	</aside><!-- end categories-menu -->

	<div id="listings">
	@foreach($products as $product)
		<div class="product">
			<a href="{{ URL::to('/store/view/'.$product->id) }}">
				<img src="{{ asset($product->image) }}" alt="Product" class="feature" style="width:240px;height:127px;">
			</a>

			<h3><a href="{{ URL::to('/store/view/'.$product->id) }}">{{ $product->title }}</a></h3>

			<p>{{ $product->description }}</p>

			<h5>
				Availability:
				<span class="{{ Availability::cssClass($product->quantity) }}">
					{{ Availability::display($product->quantity) }}
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
	</div><!-- end listings -->
@stop

@section('pagination')
	<section id="pagination">
		{{ $products->links() }}
	</section><!-- end pagination -->
@stop