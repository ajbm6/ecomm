@extends('layouts.base')

@section('title')
	Contact Us | {{ Company::$name }}
@stop

@section('content')
	<div id="contact-us">
		<h1>Contact Us</h1>

		<hr>

		<p>We are located at:</p>

		<p>
			<span>{{ Company::$name }}</span><br>
			{{ Company::$address }}
		</p>

		<p>For customer service please call us: <span>{{ Company::$phone }}</span></p>

		<p>Alternatively, you can contact <a href="mailto:{{ Company::$email }}">customer service by email</a>.</p>

		<hr>

		<p class="note">* For order related inquiries, please use the contact information provided below.</p>
	</div><!-- end contact-us -->
@stop