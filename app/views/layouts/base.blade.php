<!DOCTYPE html>
<!--[if lt IE 7]>	  <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>		 <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>		 <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>{{ Company::$name }}</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">

		<link rel="icon" href="{{ asset('favicon.png') }}">

		{{ HTML::style('css/normalize.css') }}
		{{ HTML::style('css/main.css') }}
		{{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
	</head>
	<body>
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

		<div id="wrapper">
			<header>
				<section id="top-area">
					<p>Phone orders: {{ Company::$phone }} | Email us: <a href="mailto:{{ Company::$email }}">{{ Company::$email }}</a></p>
				</section><!-- end top-area -->
				<section id="action-bar">
					<div id="logo">
						<a href="{{ URL::to('/') }}">{{ Company::$name }}</a>
					</div><!-- end logo -->

					<nav class="dropdown">
						<ul>
							<li>
								<a href="#">Shop by Category <img src="{{ asset('img/down-arrow.gif') }}" alt="Shop by Category" /></a>
								<ul>
								@foreach($catnav as $cat)
									@if(!$cat->isEmpty())
										<li><a href="{{ URL::to('/store/category/'.$cat->id) }}">{{ $cat->name }}</a></li>
									@endif
								@endforeach
								</ul>
							</li>
						</ul>
					</nav>

					<div id="search-form">
						<form action="{{ URL::to('/store/search') }}" method="get">
							<input type="text" name="keyword" placeholder="Search by keyword" class="search">
							<input type="submit" value="Search" class="search submit">
						</form>
					</div><!-- end search-form -->

					<div id="user-menu">

						@if(Auth::check())
							<nav class="dropdown">
								<ul>
									<li>
										<a href="#">
											<img src="{{ asset('img/user-icon.gif') }}" alt="{{ Auth::user()->firstname }}">
											{{ Auth::user()->firstname }}
											<img src="{{ asset('img/down-arrow.gif') }}" alt="{{ Auth::user()->firstname }}">
										</a>
										<ul>
											@if(Auth::user()->admin === 1)
												<li><a href="{{ URL::to('admin/categories') }}">Manage Categories</a></li>
												<li><a href="{{ URL::to('admin/products') }}">Manage Products</a></li>
											@endif
											<li><a href="{{ URL::to('users/signout') }}">Sign Out</a></li>
										</ul>
									</li>
								</ul>
							</nav>
						@else
							<nav id="signin" class="dropdown">
								<ul>
									<li>
										<a href="#"><img src="{{ asset('img/user-icon.gif') }}" alt="Sign In">
											Sign In <img src="{{ asset('img/down-arrow.gif') }}" alt="Sign In">
										</a>
										<ul>
											<li><a href="{{ URL::to('users/signin') }}">Sign In</a></li>
											<li><a href="{{ URL::to('users/newaccount') }}">Sign Up</a></li>
										</ul>
									</li>
								</ul>
							</nav>
						@endif

					</div><!-- end user-menu -->

					<div id="view-cart">
						<a href="{{ URL::to('store/cart') }}"><img src="{{ asset('img/blue-cart.gif') }}" alt="View Cart"> View Cart</a>
					</div><!-- end view-cart -->
				</section><!-- end action-bar -->
			</header>

			@yield('promo')

			@yield('search-keyword')

			<hr>

			<section id="main-content" class="clearfix">
				@if(Session::has('message'))
					<p class="alert">{{ Session::get('message') }}</p>
				@endif

				@yield('content')
			</section><!-- end main-content -->
	
			<hr>

			@yield('pagination')

			<footer>
				<section id="contact">
					<h3>For phone orders please call {{ Company::$phone }}.<br>You can also email us at <a href="mailto:{{ Company::$email }}">{{ Company::$email }}</a></h3>
				</section><!-- end contact -->

				<hr>

				<section id="links">
					<div id="my-account">
						<h4>MY ACCOUNT</h4>
						<ul>
							<li><a href="{{ URL::to('users/signin') }}">Sign In</a></li>
							<li><a href="{{ URL::to('users/newaccount') }}">Sign Up</a></li>
							<li><a href="{{ URL::to('store/cart') }}">Shopping Cart</a></li>
						</ul>
					</div><!-- end my-account -->

					<!-- <div id="info">
						<h4>INFORMATION</h4>
						<ul>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div> -->

					<div id="extras">
						<h4>EXTRAS</h4>
						<ul>
							<li><a href="#">About Us</a></li>
							<li><a href="{{ URL::to('store/contact') }}">Contact Us</a></li>
						</ul>
					</div><!-- end extras -->
				</section><!-- end links -->

				<hr>

				<section class="clearfix">
					<div id="copyright">
						<div id="logo">
							<a href="#">{{ Company::$name }}</a>
						</div><!-- end logo -->
						<p id="store-desc">{{ Company::$desc }}</p>
						<p id="store-copy">&copy; 2015 {{ Company::$name }}.</p>
					</div><!-- end copyright -->

					<!-- <div id="connect">
						<h4>CONNECT WITH US</h4>
						<ul>
							<li class="twitter"><a href="#">Twitter</a></li>
							<li class="fb"><a href="#">Facebook</a></li>
						</ul>
					</div> -->

					<div id="payments">
						<h4>SUPPORTED PAYMENT METHODS</h4>
						<img src="{{ asset('img/payment-methods.gif') }}" alt="Supported Payment Methods">
					</div><!-- end payments -->
				</section>
			</footer>
		</div><!-- end wrapper -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery-1.9.1.min.js') }}"><\/script>')</script>
		{{ HTML::script('js/plugins.js') }}
		{{ HTML::script('js/main.js') }}

		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src='//www.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
	</body>
</html>
