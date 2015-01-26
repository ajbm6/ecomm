@extends('layouts.base')

@section('title')
	Search "{{ $keyword }}" | {{ Company::$name }}
@stop

@section('search-keyword')
	<hr>

	<section id="search-keyword">
		<h1>Search results for <span>"{{ $keyword }}"</span> ({{ $count }} found)</h1>
	</section><!-- end search-keyword -->
@stop

@section('content')
	<div id="search-results">
		@include('includes.product-loop')
	</div><!-- end search-results -->
@stop

@section('pagination')
	<section id="pagination">
		{{ $products->appends(Request::only('keyword'))->links() }}
	</section><!-- end pagination -->
@stop