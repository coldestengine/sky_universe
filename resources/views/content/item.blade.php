@extends('layouts.bootstrap')
@section('title')
    Item
@endsection
@section('content')
<div class="container mt-5 rounded-3 px-0 overflow-hidden">
    <div class="row">
        <img class="col " src="{{ asset($product->image) }}" alt="" style="height:600px; width:424px;">
        <div class="col-1 verticaltext fw-bold fs-2 text-center ">
            Best places to wear
        </div>
        <div class="col d-flex flex-column">
            <img width="400" height="218" class="col mb-4" src="https://source.unsplash.com/900x400/?field" alt="">
            <img width="400" height="218" class="col" src="https://source.unsplash.com/900x400/?ballroom" alt="">
        </div>
        <div class="col d-flex flex-column">
            <img width="400" height="218" class="col mb-4" src="https://source.unsplash.com/900x400/?beach" alt="">
            <img width="400" height="218" class="col" src="https://source.unsplash.com/900x400/?building" alt="">
        </div>
    </div>
</div>

<div class="container mt-1 px-0 overflow-hidden">
    <div class="row mt-4 mb-5">
        <div class="col-8">
            <h1 class="fw-bolder">{{ $product->name }}</h1>
            @php
                use Faker\Factory as Faker;
                $faker = Faker::create();
                $sold = $faker->numberBetween(100, 1000);
                $review = $faker->numberBetween(100, $sold);
                $wishlist = $faker->numberBetween(100, 5000);
                $total = $product->qty_s + $product->qty_m + $product->qty_l + $product->qty_xl;
            @endphp
            {{-- generate random tagline --}}
            <p class="fw-bold text-pink @if (Auth::user()->gender == 'Female') text-pink @else text-blue @endif">@if (Auth::user()->gender == 'Female') Beautiful dress @else Elegant Suit @endif · <span class="text-secondary fw-normal">{{ Carbon\Carbon::parse($product->created_at)->format('d M Y') }}</span></p>
            <hr>
            <p class="fw-bold">Description</p>
            <p>{{ $product->description }}</p>
            <div class="row mt-4 mb-5">
                <div class="col lh-1">
                    <p class="fw-bold text-secondary">SOLD</p>
                    <h4 class="fw-bold">{{ $sold }}</h4>
                </div>
                <div class="col lh-1">
                    <p class="fw-bold text-secondary">TOTAL REVIEW</p>
                    <h4 class="fw-bold">{{ $review }}</h4>
                </div>
                <div class="col lh-1">
                    <p class="fw-bold text-secondary">ADDED TO WISHLIST</p>
                    <h4 class="fw-bold">{{ $wishlist }}</h4>
                </div>
            </div>
            <form action="{{ route('cart') }}" method="post">
        </div>
            @csrf
        <div class="col-4 d-flex justify-content-end">
            <div class="card col-10 p-2">
                <div class="card-body">
                  <h6 class="card-title text-secondary fw-bold">Legendary Item</h6>
                  {{-- convert price to rupiah --}}
                  <h1 class="fw-bold">IDR {{ number_format($product->price, 0, ',', '.') }}</h1>
                  <h6 class="card-title text-blue fw-bold">Only {{ $total }} available <i class="bi bi-patch-check-fill"></i></h6>
                  <p class="fs-7 text-muted">Purchase in next 24 hours will come with a free gift from Sky Universe.</p>
                  <hr class="p-0">
                  <input type="hidden" name="item_id" value="{{ $product->id }}">
                  <button type="submit" class="btn btn-dark col-12 mb-2" id="purchase-btn">Purchase Item</button>
                  <button class="btn bg-pink col-12" data-item-id="{{ $product->id }}" id="cart-btn">Add to cart <i class="icon-shopping-cart"></i></button>
                  <div class="text-center mt-1">
                      <span id="cart-message" class="text-success col-12 text-center w-100"></span>
                  </div>
                </div>
              </div>
        </div>
        </form>
    </div>
</div>
@endsection
