@extends('layouts.base')

@section('title')
	Manage Products | {{ Company::$name }}
@stop

@section('content')
	<div id="admin">
		<h1>Products Admin Panel</h1>
		<hr>

		<p>Here you can view, delete, and create new products.</p>

		<h2>Products</h2>

		<table>
		@foreach($products as $product)
			<tr>
				<td>
					<img src="{{ asset($product->image) }}" alt="{{ $product->title }}" style="width:50px;"> 
					{{ $product->title }}
				</td>
				<td>
					Qty: {{ $product->quantity }}
					<form method="post" class="form-inline" action="{{ URL::to('admin/products/add-quantity') }}">
						<input type="hidden" name="id" value="{{ $product->id }}">
						<input type="submit" value="Add" class="btn-prod btn-prod-confirm">
						<input type="number" name="quantity" class="form-price" value="0">
						{{ Form::token() }}
					</form>
				</td>
				<td>
					<form method="post" class="form-inline" action="{{ URL::to('admin/products/destroy') }}">
						<input type="hidden" name="id" value="{{ $product->id }}">
						<input type="submit" value="Delete" class="btn-prod btn-prod-danger">
						{{ Form::token() }}
					</form>
				</td>
			</tr>
		@endforeach
		</table>

		<h2>Create New product</h2>
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
		<form method="post" action="{{ URL::to('admin/products/create') }}" enctype="multipart/form-data">	
			<p>
				<label for="category_id">Category</label>
				<select name="category_id" id="category_id">
				@foreach($categories as $id => $name)
					<option value="{{ $id }}"{{ ($id === (int)Input::old('category_id')) ? ' selected' : '' }}>{{ $name }}</option>
				@endforeach
				</select>
			</p>
			<p>
				<label for="title">Title</label>
				<input type="text" name="title" id="title" value="{{ Input::old('title') }}">
			</p>
			<p>
				<label for="description">Description</label>
				<textarea name="description" id="description">{{ Input::old('description') }}</textarea>
			</p>
			<p>
				<label for="price">Price</label>
				<input type="text" name="price" id="price" class="form-price" value="{{ Input::old('price') }}">
			</p>
			<p>
				<label for="quantity">Initial quantity</label>
				<input type="number" name="quantity" id="quantity" class="form-price" value="{{ (Input::old('quantity') === NULL) ? '1' : Input::old('quantity') }}">
			</p>
			<p>
				<label for="image">Choose an image</label>
				<input type="file" name="image" id="image">
			</p>
			<input type="submit" value="Create Product" class="secondary-cart-btn">
			{{ Form::token() }}
		</form>
	</div><!-- end admin -->

@stop