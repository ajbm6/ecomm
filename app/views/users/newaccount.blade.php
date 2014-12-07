@extends('layouts.base')

@section('content')
	
	<div id="new-account">

		<h1>Create New Account</h1>

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

		<form action="{{ URL::to('users/create') }}" method="post">
			<p>
				<label for="firstname">Firstname</label>
				<input type="text" name="firstname" id="firstname" value="{{ Input::old('firstname') }}">
			</p>
			<p>
				<label for="lastname">Lastname</label>
				<input type="text" name="lastname" id="lastname" value="{{ Input::old('lastname') }}">
			</p>
			<p>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="{{ Input::old('email') }}">
			</p>
			<p>
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
			</p>
			<p>
				<label for="password_confirmation">Password Confirmation</label>
				<input type="password" name="password_confirmation" id="password_confirmation">
			</p>
			<p>
				<label for="telephone">Telephone</label>
				<input type="text" name="telephone" id="telephone" value="{{ Input::old('telephone') }}">
			</p>
			<input type="submit" value="CREATE NEW ACCOUNT" class="secondary-cart-btn">
			{{ Form::token() }}
		</form>

	</div><!-- end new-account -->

@stop