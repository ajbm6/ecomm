@extends('layouts.base')

@section('title')
	Manage Categories | {{ Company::$name }}
@stop

@section('content')
	<div id="admin">
		<h1>Categories Admin Panel</h1>
		<hr>

		<p>Here you can view, delete, and create new categories.</p>

		<h2>Category List</h2>
		<hr>

		<table>
			<tr>
				<th>Category</th>
				<th class="col-delete">Delete</th>
			</tr>
		@foreach($categories as $category)
			<tr>
				<td>{{ $category->name }} ({{ $category->productCount() }})</td>
				<td>
					<form method="post" class="form-inline" action="{{ URL::to('admin/categories/destroy') }}">
						<input type="hidden" name="id" value="{{ $category->id }}">
						<input type="submit" value="Delete" class="btn-prod btn-prod-danger">
						{{ Form::token() }}
					</form>
				</td>
			</tr>
		@endforeach
		</table>

		<h2>Create New Category</h2>
		<hr>

		@if($errors->has())
		<div id="form-errors">
			<p>The following errors have occured:</p>
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div><!-- end form-errors -->
		@endif

		<form method="post" action="{{ URL::to('admin/categories/create') }}">	
			<p>
				<label for="name">Name</label>
				<input type="text" name="name" id="name">
			</p>
			<input type="submit" value="Create Category" class="secondary-cart-btn">
			{{ Form::token() }}
		</form>
	</div><!-- end admin -->

@stop