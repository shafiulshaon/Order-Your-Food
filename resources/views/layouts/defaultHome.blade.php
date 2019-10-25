<!DOCTYPE html>
<html>
<head>
	<title> @yield('pagetitle') </title>
	<link rel="stylesheet" type="text/css" href="/css/global.css">

<div class="loginHeader"> 

	<span>Food Town</span>
		<nav>
			<ul>
				<li>
					@yield('profile')
				</li>
				<li>
					@yield('item')
				</li>
				<li>
					 @yield('order')
				</li>
				<li>
					@yield('changePass')
				</li>
				<li>
					@yield('logout')
				</li>
			</ul>
		</nav>
	</div>

</head>
<body>

	<div id="Container" style="background: none; background-color: #ddd6af3d;">

		<div id="welcomebox">
			@yield('content')  
		</div>

		<div id="validation">
			@yield('validation')  
		</div>

		@yield('fixedBottomLabel')

	</div>

</body>
</html>