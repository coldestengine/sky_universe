<link rel="stylesheet" href="{{asset('assets/home/css/bootstrap.css')}}">
<style>
    .notification-badge::before{
        content: '{{ $cart }}';
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-3">
            <div id="fh5co-logo"><a href="{{ route('home') }}">Sky Universe<strong>.</strong></a></div>
        </div>
        <div class="col-xs-9 text-right menu-1">
            <form class="row d-flex justify-content-end align-items-center" method="POST" action="{{ route('logout') }}">
                <a class="text-reset @if($cart) notification-badge @endif" href="#"><i class="fs-1 icon-shopping-cart" style="color: @if(Auth::user()->gender == 'Male') #5d87ff @else #f14e95 @endif;"></i></a>
                @csrf
                <button class="btn-reset"><a href="{{ route('home') }}">Home</a></button>
                <button type="submit" class="btn-reset" style="color: #dc3545;">Logout</button>
            </form>
        </div>
    </div>

</div>
