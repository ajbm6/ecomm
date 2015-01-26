@extends('layouts.base')

@section('title')
	Your Cart | {{ Company::$name }}
@stop

@section('content')
	<div id="shopping-cart">
		<h1>Shopping Cart &amp; Checkout</h1>

		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<table border="1">
				<tr>
					<th>#</th>
					<th>Product Name</th>
					<th>Unit Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
				</tr>

				@foreach($products as $product)
				<tr>
					<td>{{ str_pad($product->id, 5, '0', STR_PAD_LEFT) }}</td>
					<td>
						<img src="{{ $product->image }}" alt="{{ $product->name }}" width="65" height="37" /> 
						{{ $product->title }}
					</td>
					<td>&#8369;{{ $product->price }}</td>
					<td>
						{{ $product->quantity }}
					</td>
					<td>
						{{ $product->price }}
						<a href="{{ URL::to('store/removeitem/'.$product->identifier) }}">
							<img src="{{ asset('img/remove.gif') }}" alt="Remove product">
						</a>
					</td>
				</tr>
				@endforeach

				<tr class="total">
					<td colspan="5">
						Subtotal: &#8369;{{ Cart::total() }}<br>
						<span>TOTAL: &#8369;{{ Cart::total() }}</span><br>

						<!-- Paypal hidden fields -->

						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="business" value="{{ Company::$email }}"> 
						<input type="hidden" name="item_name" value="{{ Company::$name }} Purchase"> 
						<input type="hidden" name="amount" value="{{ Cart::total() }}">
						<input type="hidden" name="first_name" value="{{ Auth::user()->firstname }}">
						<input type="hidden" name="last_name" value="{{ Auth::user()->lastname }}">
						<input type="hidden" name="email" value="{{ Auth::user()->email }}">
						<input type="hidden" name="currency_code" value="PHP"> 

						<!-- Paypal hidden fields -->

						<a href="{{ URL::to('/') }}" class="tertiary-btn">CONTINUE SHOPPING</a>
						<input type="submit" value="CHECKOUT WITH PAYPAL" class="secondary-cart-btn">
					</td>
				</tr>
			</table>
		</form>
	</div><!-- end shopping-cart -->
@stop