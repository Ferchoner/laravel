<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class=" js no-touch svg inlinesvg svgclippaths no-ie8compat" lang="en">
	<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		{{-- Set the viewport width to device width for mobile --}}
		<meta name="viewport" content="width=device-width">		
		<title>Bienvenido a mi Primer Proyecto</title>
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/foundation.css">
		<link rel="stylesheet" href="/css/global.css" type="text/css" media="screen" title="Estilos Globales" charset="utf-8"/>
		<title>Usuarios</title>
	</head>
	<body>
		{{-- Header and Nav --}}
		<div class="row">
			<div class="large-3 columns">
				<h1 id="aHome"><img src="http://placehold.it/400x100&text=Logo" /></h1>
			</div>
			<div class="large-9 columns">
				<ul id="my_account_buttons" class="right button-group">
					{{$myAccountHeader}}
				</ul>
			</div>
		</div>
		{{-- End Header and Nav --}}

		<div class="row">
			{{-- Main Content Section --}}
			{{-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens --}}
			{{ $content }}
			{{-- Nav Sidebar --}}
			{{-- This is source ordered to be pulled to the left on larger screens --}}
			<div class="large-3 pull-9 columns">
				<ul class="side-nav">					
					<li>
						<a id="showMap">Buscar Oxxos</a>
					</li>
					<li>
						<a href="#">Section 2</a>
					</li>
					<li>
						<a href="#">Section 3</a>
					</li>
					<li>
						<a href="#">Section 4</a>
					</li>
					<li>
						<a href="#">Section 5</a>
					</li>
					<li>
						<a href="#">Section 6</a>
					</li>
				</ul>

				<p><img src="http://placehold.it/320x240&text=Ad" />
				</p>

			</div>
		</div>
		{{-- Footer --}}
		<footer class="row">
			<div class="large-12 columns">
				<hr />
				<div class="row">
					<div class="large-6 columns">
						<p>
							&copy; Copyright no one at all. Go to town.
						</p>
					</div>
					<div class="large-6 columns">
						<ul class="inline-list right">
							<li>
								<a href="#">Section 1</a>
							</li>
							<li>
								<a href="#">Section 2</a>
							</li>
							<li>
								<a href="#">Section 3</a>
							</li>
							<li>
								<a href="#">Section 4</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<script src="/js/vendor/custom.modernizr.js"></script>
		<script src="/js/jquery.min.js"></script>
		<script src="/js/foundation.min.js"></script>
		<script src="/js/error-module.js"></script>
		<script src="/js/principal.js"></script>
		<script src="/js/vendor/zepto.js"></script>
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBOsVNVZT8bOI-qww5JfGfTUIeAsD-yVOE&sensor=false"></script>
		<script src="/js/maps.js" type="text/javascript" charset="utf-8"></script>		
	</body>
</html>