<!DOCTYPE html>
    <html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sky Universe | Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

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
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<div class="fh5co-loader"></div>

	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="fh5co-logo"><a href="index.html">Wedding<strong>.</strong></a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li class="active"><a href="index.html">Home</a></li>
						<li><a href="about.html">Story</a></li>
						<li class="has-dropdown">
							<a href="services.html">Services</a>
							<ul class="dropdown">
								<li><a href="#">Web Design</a></li>
								<li><a href="#">eCommerce</a></li>
								<li><a href="#">Branding</a></li>
								<li><a href="#">API</a></li>
							</ul>
						</li>
						<li class="has-dropdown">
							<a href="gallery.html">Gallery</a>
							<ul class="dropdown">
								<li><a href="#">HTML5</a></li>
								<li><a href="#">CSS3</a></li>
								<li><a href="#">Sass</a></li>
								<li><a href="#">jQuery</a></li>
							</ul>
						</li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
			</div>

		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url({{asset('assets/home/images/img_bg_2.jpg')}});" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
                            @php
                                Auth::user()->couplesAsUser1->count() > 0 ? $couple = Auth::user()->couplesAsUser1->first() : $couple = Auth::user()->couplesAsUser2->first();
                            @endphp

                            @if ($couple)
                                <h1>{{ $couple->user1->name }} &amp; {{ $couple->user2->name }}</h1>
                                <h2>You're getting married!</h2>
                            @else
                                <h1>No couple information found</h1>
                            @endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-gallery" class="fh5co-section-gray">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>Our Memories</span>
					<h2>Wedding Gallery</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
				</div>
			</div>
			<div class="row row-bottom-padded-md">
				<div class="col-md-12">
					<ul id="fh5co-gallery-list">

						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('assets/home/images/gallery-1.jpg')}}); ">
						<a href="{{asset('assets/home/images/gallery-1.jpg')}}">
							<div class="case-studies-summary">
								<span>14 Photos</span>
								<h2>Two Glas of Juice</h2>
							</div>
						</a>
					</li>
					<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('assets/home/images/gallery-2.jpg')}}); ">
						<a href="#" class="color-2">
							<div class="case-studies-summary">
								<span>30 Photos</span>
								<h2>Timer starts now!</h2>
							</div>
						</a>
					</li>


					<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('assets/home/images/gallery-3.jpg')}}); ">
						<a href="#" class="color-3">
							<div class="case-studies-summary">
								<span>90 Photos</span>
								<h2>Beautiful sunset</h2>
							</div>
						</a>
					</li>
					<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('assets/home/images/gallery-4.jpg')}}); ">
						<a href="#" class="color-4">
							<div class="case-studies-summary">
								<span>12 Photos</span>
								<h2>Company's Conference Room</h2>
							</div>
						</a>
					</li>

						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('assets/home/images/gallery-5.jpg')}}); ">
							<a href="#" class="color-3">
								<div class="case-studies-summary">
									<span>50 Photos</span>
									<h2>Useful baskets</h2>
								</div>
							</a>
						</li>
						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('assets/home/images/gallery-6.jpg')}}); ">
							<a href="#" class="color-4">
								<div class="case-studies-summary">
									<span>45 Photos</span>
									<h2>Skater man in the road</h2>
								</div>
							</a>
						</li>

						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('assets/home/images/gallery-7.jpg')}}); ">
							<a href="#" class="color-4">
								<div class="case-studies-summary">
									<span>35 Photos</span>
									<h2>Two Glas of Juice</h2>
								</div>
							</a>
						</li>

						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('assets/home/images/gallery-8.jpg')}}); ">
							<a href="#" class="color-5">
								<div class="case-studies-summary">
									<span>90 Photos</span>
									<h2>Timer starts now!</h2>
								</div>
							</a>
						</li>
						<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{asset('assets/home/images/gallery-9.jpg')}}); ">
							<a href="#" class="color-6">
								<div class="case-studies-summary">
									<span>56 Photos</span>
									<h2>Beautiful sunset</h2>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo">
		
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="{{asset('assets/home/js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('assets/home/js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('assets/home/js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('assets/home/js/jquery.waypoints.min.js')}}"></script>
	<!-- Carousel -->
	<script src="{{asset('assets/home/js/owl.carousel.min.js')}}"></script>
	<!-- countTo -->
	<script src="{{asset('assets/home/js/jquery.countTo.js')}}"></script>

	<!-- Stellar -->
	<script src="{{asset('assets/home/js/jquery.stellar.min.js')}}"></script>
	<!-- Magnific Popup -->
	<script src="{{asset('assets/home/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('assets/home/js/magnific-popup-options.js')}}"></script>

	<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
	<script src="{{asset('assets/home/js/simplyCountdown.js')}}"></script>
	<!-- Main -->
	<script src="{{asset('assets/home/js/main.js')}}"></script>

	<script>
    var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate()
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
</script>

	</body>
</html>

