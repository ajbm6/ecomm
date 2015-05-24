@extends('layouts.base')

@section('content')
	<h2>Featured Products</h2>
	<hr>
	<div id="products">
		@include('includes.product-loop')
	</div><!-- end products -->
@stop