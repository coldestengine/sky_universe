<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sky Universe | Item</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstra.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <link rel="shortcut icon" type="image/png" href="{{ asset('logo/dark_logo.png') }}" />

	<link rel="stylesheet" href="{{asset('assets/home/css/icomoon.css')}}">

    {{-- Bootstrap icon --}}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="{{ asset('assets/home/js/item-detail.js') }}"></script>
    <style>
        body {
            font-family: 'Work Sans', sans-serif;
        }
        .heading{
            font-family: "Sacramento";
        }
        .verticaltext{
            writing-mode: vertical-rl;
            text-orientation: mixed;
            rotate: 180deg;
            width: fit-content;
        }
        a{
            text-decoration: none;
        }
        .text-pink{
            color: #f14e95;
        }
        .text-blue{
            color: #5d87ff;
        }
        .bg-pink{
            background-color: #f14e95;
        }
        .bg-blue{
            background-color: #5d87ff;
        }
        .card{
            height: fit-content;
        }
    </style>
</head>
<body>
      @include('partials.navigation_bootstrap')

      <div class="container p-0">
        @yield('content')
      </div>


      <footer id="fh5co-footer" role="contentinfo">
        @include('partials.footer_bootstrap')
	</footer>
</body>
</html>
