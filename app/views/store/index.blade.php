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
		@include('includes.product-loop')
	</div><!-- end products -->
@stop