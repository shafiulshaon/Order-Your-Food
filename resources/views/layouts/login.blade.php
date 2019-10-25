<!DOCTYPE html>
<html>
<head>
	<title> @yield('pagetitle') </title>
	<link rel="stylesheet" type="text/css" href="/css/global.css">

	@yield('style')

<div class="loginHeader"> 


	<span><a style="text-decoration: none; color: #d8d33c;" href="{{route('login')}}" class="hvr-underline-from-center"> Food Town </a></span>
		<nav> 
			<ul>
				<li>
					<a href="{{route('login')}}" class="hvr-underline-from-center"> Login </a>
				</li>
				<li>
					<a href="{{route('customerRegistration')}}" class="hvr-underline-from-center"> Order Food </a>
				</li>
				<li>
					<a href="{{route('restaurantRegistration')}}" class="hvr-underline-from-center"> Open Restaurant </a>
				</li>
				<li>
					<a href="{{route('contact')}}" class="hvr-underline-from-center"> Contact</a>
				</li>
				<li>
					<a href="{{route('faq')}}" class="hvr-underline-from-center"> About & FAQ</a>
				</li>
			</ul>
		</nav>
	</div>

</head>
<body>

	<div id="Container">

		<div id="legend">
			@yield('legend')
		</div>

		<div id="loginbox">
			@yield('content')  
		</div>


		<div id="validation">
			@yield('validation')  
		</div>

		<div id="footer">
		<p>&copy; 2018 Food Town. All rights reserved. Developed by <a href="#">White Walkers Team</a></p>
		</div>

	</div>

</body>
</html>