@extends('layouts.base')

@section('title')
	{{ $category->name }} | {{ Company::$name }}
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
		@include('includes.product-loop')
	</div><!-- end listings -->
@stop

@section('pagination')
	<section id="pagination">
		{{ $products->links() }}
	</section><!-- end pagination -->
@stop