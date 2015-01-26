@extends('layouts.base')

@section('title')
	Sign In | {{ Company::$name }}
@stop

@section('content')

	<section id="signin-form">
		<h1>I have an account</h1>
		<form action="{{ URL::to('users/signin') }}" method="post">
			<p>
				<img src="{{ asset('img/email.gif') }}">
				<input type="text" name="email">
			</p>
			<p>
				<img src="{{ asset('img/password.gif') }}">
				<input type="password" name="password">
			</p>

			<button type="submit" class="secondary-cart-btn">
				SIGN IN
			</button>
			{{ Form::token() }}
		</form>
	</section><!-- end signin-form -->

	<section id="signup">
		<h2>I'm a new customer</h2>

		<a href="{{ URL::to('users/newaccount') }}" class="default-btn">CREATE AN ACCOUNT</a>
	</section><!--- end signup -->

@stop