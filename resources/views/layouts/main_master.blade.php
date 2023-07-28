<!DOCTYPE html>
    <html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sky Universe | Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

    <link rel="shortcut icon" type="image/png" href="{{ asset('logo/dark_logo.png') }}" />

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('assets/home/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('assets/home/css/icomoon.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('assets/home/css/bootstrap.css')}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('assets/home/css/magnific-popup.css')}}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{asset('assets/home/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/home/css/owl.theme.default.min.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('assets/home/css/style.css')}}">

	<!-- Modernizr JS -->
	<script src="{{asset('assets/home/js/modernizr-2.6.2.min.js')}}"></script>

    {{-- Jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	</head>
	<body>

	<div class="fh5co-loader"></div>

	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		@include('partials.navigation')
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(https://source.unsplash.com/1500x1000/?wedding);" data-stellar-background-ratio="0.5">
		@include('partials.header')
	</header>

	<div id="fh5co-gallery" class="fh5co-section-gray">
		@yield('content')
	</div>

	<footer id="fh5co-footer" role="contentinfo">
		@include('partials.footer')
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="{{asset('assets/home/js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('assets/home/js/jquery.easing.1.3.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('assets/home/js/jquery.waypoints.min.js')}}"></script>
	<!-- Carousel -->
	<script src="{{asset('assets/home/js/owl.carousel.min.js')}}"></script>

	<!-- Stellar -->
	<script src="{{asset('assets/home/js/jquery.stellar.min.js')}}"></script>

	<!-- Main -->
	<script src="{{asset('assets/home/js/main.js')}}"></script>

	</body>
</html>

