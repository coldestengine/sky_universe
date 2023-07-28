@extends('layouts.bootstrap')
@section('title')
    Cart
@endsection
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
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
<style>
    .fs-7 {
        font-size: 0.8rem;
    }
    .bi:hover{
        cursor: pointer;
    }
</style>
@php
    use Faker\Factory as Faker;
    $faker = Faker::create();
@endphp
<div class="container mt-5 px-0 overflow-hidden">

    @if($products)
    <div class="row">
        @php
            $i = 0;
        @endphp
        @foreach ($products as $item)
            <div class="col-4">
                @php
                    $i++;
                @endphp
                @if($i == 1)
                <div class="container rounded-2 border border-2 p-3">
                    <div class="row px-3">
                        <div class="col">
                            <div class="form-check">
                                <input value="delivery" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                Home Delivery
                                </label>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="form-check">
                                <input value="collect" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Click & Collect
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="col">
                            <p>Subtotal: <span id="subtotal" data-price="{{ $total }}" class="float-end">IDR {{ number_format($total, 0, ',', '.') }}</span></p>
                            <p id="delivery">Delivery: <span data-price="{{ $total*.01 }}" id="delivery-price" class="float-end">IDR {{ number_format(($total*.01), 0, ',', '.') }}</span></p>
                        </div>
                        <hr>
                        <p class="fs-5 fw-bold">Total: <span id="total" class="float-end">IDR {{ number_format(($total+$total*.01), 0, ',', '.') }}</span></p>
                        <hr>
                        <button class="btn btn-success mb-3 mt-3" id="myInput" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Checkout</button>
                        <p class="fs-7 p-0">This site is protected by reCAPTCHA and the Google <span class="text-primary">Privacy Policy</span> and <span class="text-primary">Terms of Service</span> apply.</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-8 mb-4">
                <div class="container rounded-2 border border-2">
                    <div class="row p-3">
                        <div class="col-4">
                            <img class="rounded-2" src="{{ asset($item->product->image) }}" alt="" style="height:360.85px; width:255px;">
                        </div>
                        <div class="col-8">
                            <h3 class="fw-bold">{{ $item->product->name }} <span class="float-end ms-5"><i data-id="{{ $item->product->id }}" class="bi bi-x del-item"></i></span></h3>
                            <p>{{ $item->product->description }}</p>
                            <div class="col lh-1">
                                <p class="fw-lighter">Ref: {{ $item->product->id }}</p>
                                <p class="d-flex align-items-center m-0 "><i class="fs-2 @if($faker->boolean) bi bi-check text-success @else bi bi-x text-danger @endif"></i> Click & Collect</p>
                                <p class="d-flex align-items-center m-0 "><i class="bi bi-check fs-2 text-success"></i> Home Delivery</p>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-8 d-flex align-items-center">
                                    <div class="col-3 me-3">
                                        <select id="size" class="form-select text-center" aria-label="Default select example">
                                            <option selected>Size</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                        </select>
                                    </div>
                                    <p class="mt-3 me-3" id="{{ $item->product->id }}" >Quantity: {{ $item->product->qty_s + $item->product->qty_s + $item->product->qty_s + $item->product->qty_s }}</p>
                                </div>
                                <div class="col d-flex align-items-center justify-content-end">
                                    IDR {{ number_format($item->product->price, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    @else
    <div class="row">
        <div class="col-4">
            <div class="container rounded-2 border border-2 p-3">
                <div class="row px-3">
                    <div class="col">
                        <div class="form-check">
                            <input value="delivery" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                            Home Delivery
                            </label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="form-check">
                            <input value="collect" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Click & Collect
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="col">
                        <p>Subtotal: <span id="subtotal" data-price="{{ $product->price }}" class="float-end">IDR {{ number_format($product->price, 0, ',', '.') }}</span></p>
                        <p id="delivery">Delivery: <span data-price="{{ $product->price*.01 }}" id="delivery-price" class="float-end">IDR {{ number_format(($product->price*.01), 0, ',', '.') }}</span></p>
                    </div>
                    <hr>
                    <p class="fs-5 fw-bold">Total: <span id="total" class="float-end">IDR {{ number_format(($product->price+$product->price*.01), 0, ',', '.') }}</span></p>
                    <hr>
                    <button class="btn btn-success mb-3 mt-3" id="myInput" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Checkout</button>
                    <p class="fs-7 p-0">This site is protected by reCAPTCHA and the Google <span class="text-primary">Privacy Policy</span> and <span class="text-primary">Terms of Service</span> apply.</p>
                </div>
            </div>
        </div>
        <div class="col-8 mb-4">
            <div class="container rounded-2 border border-2">
                <div class="row p-3">
                    <div class="col-4">
                        <img class="rounded-2" src="{{ asset($product->image) }}" alt="" style="height:360.85px; width:255px;">
                    </div>
                    <div class="col-8">
                        <h3 class="fw-bold">{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                        <div class="col lh-1">
                            <p class="fw-lighter">Ref: {{ $product->id }}</p>
                            <p class="d-flex align-items-center m-0 "><i class="fs-2 @if($faker->boolean) bi bi-check text-success @else bi bi-x text-danger @endif"></i> Click & Collect</p>
                            <p class="d-flex align-items-center m-0 "><i class="bi bi-check fs-2 text-success"></i> Home Delivery</p>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-8 d-flex align-items-center">
                                <div class="col-3 me-3">
                                    <select id="size" class="form-select text-center" aria-label="Default select example">
                                        <option selected>Size</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                </div>
                                <p class="mt-3 me-3">Quantity: {{ $product->qty_s + $product->qty_s + $product->qty_s + $product->qty_s }}</p>
                            </div>
                            <div class="col d-flex align-items-center justify-content-end">
                                IDR {{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    @endif
</div>
<div class="container mt-3 mb-5 overflow-hidden rounded-2 border border-2 p-3">
    <p class="fw-bold">
        Delivery Information:
    </p>
    <p>
        Standard Delivery is 2-4 working days.
    </p>
    <p>
        <b>Need it faster?</b> <br>
        You can upgrade to <b>Next Day Delivery</b> during Checkout for <b>Next Working Day (Order before 10pm)</b>. Next Day Delivery is not available outside of Mainland UK. <b>Delivery is Monday to Friday, excluding public holidays.</b>
    </p>
    <p>
        Any orders placed after IOpm Friday and over the weekend will not be dispatched until Monday, excluding Public Holidays.
    </p>
    <p>
        FREE returns to any Sky Universe store near you.
    </p>
    <p>
        Please note, some large items will be delivered in their original packing which may display images or details Of the contents.
    </p>




</div>

<!-- Modal boostrap -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        @if($products)
        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Thankyou!</h1>
            </div>
            <div class="modal-body">
                Hope you enjoy the experience with Sky Universe!
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary bg-pink text-white" data-bs-dismiss="modal">Back to home</button>
            </div>
        </form>
      @else
      <div class="modal-header">
            <h1 class="modal-title fs-5 fw-bold" id="staticBackdropLabel">Thankyou!</h1>
        </div>
        <div class="modal-body">
            <div class="col d-flex justify-content-center flex-column align-items-center">
                <p class="fw-bold">CHECKOUT SUCCESS</p>
                <h1 style="font-size: 10rem;">
                    <i class="bi bi-patch-check-fill text-success"></i>
                </h1>
                Hope you enjoy the experience with Sky Universe!
            </div>
        </div>
        <div class="modal-footer">
            <a href="{{ route('home') }}">
                <button type="submit" class="btn btn-primary bg-pink text-white" data-bs-dismiss="modal">Back to home</button>
            </a>
        </div>
      @endif
    </div>
  </div>
</div>

@endsection
