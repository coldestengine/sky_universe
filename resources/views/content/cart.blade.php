@extends('layouts.bootstrap')
@section('content')
<style>
    .fs-7 {
        font-size: 0.8rem;
    }
</style>
<div class="container mt-5 px-0 overflow-hidden">

    <div class="row">
        <div class="col-8 mb-4">
            <div class="container rounded-2 border border-2">
                <div class="row p-3">
                    <div class="col-4">
                        <img class="rounded-2" src="https://source.unsplash.com/900x400/?field" alt="" style="height:360.85px; width:255px;">
                    </div>
                    <div class="col-8">
                        <h3 class="fw-bold">Item Name <span class="float-end ms-5"><i class="bi bi-x"></i></span></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores cumque, quas ipsum dicta ab ex tempora at? Error, quam consectetur? Minus voluptate esse illum vitae debitis tempora qui nobis consequuntur!</p>
                        <div class="col lh-1">
                            <p class="fw-lighter">Ref: 1</p>
                            <p class="d-flex align-items-center m-0 "><i class="bi bi-check fs-2 text-success"></i> Click & Collect</p>
                            <p class="d-flex align-items-center m-0 "><i class="bi bi-check fs-2 text-success"></i> Home Delivery</p>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-4 d-flex align-items-center ">
                                <p class="mt-3 me-3">Size: </p>
                                <select class="form-select text-center" aria-label="Default select example">
                                    <option selected>Size</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </div>
                            <div class="col d-flex align-items-center justify-content-end">
                                IDR 100.000.000
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="container rounded-2 border border-2 p-3">
                <div class="row px-3">
                    <div class="col">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                          <label class="form-check-label" for="flexRadioDefault2">
                            Home Delivery
                          </label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Click & Collect
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="col">
                        <p>Subtotal: <span class="float-end">IDR 200.000.000</span></p>
                        <p>Delivery: <span class="float-end">IDR 200.000.000</span></p>
                    </div>
                    <hr>
                    <p class="fs-5 fw-bold">Total: <span class="float-end">IDR 200.000.000</span></p>
                    <hr>
                    <button class="btn btn-success mb-3 mt-3">Checkout</button>
                    <p class="fs-7 p-0">This site is protected by reCAPTCHA and the Google <span class="text-primary">Privacy Policy</span> and <span class="text-primary">Terms of Service</span> apply.</p>
                </div>
            </div>
        </div>
        @for ($i=0; $i<5; $i++)
        <div class="col-8 mb-4">
            <div class="container rounded-2 border border-2">
                <div class="row p-3">
                    <div class="col-4">
                        <img class="rounded-2" src="https://source.unsplash.com/900x400/?field" alt="" style="height:360.85px; width:255px;">
                    </div>
                    <div class="col-8">
                        <h3 class="fw-bold">Item Name <span class="float-end ms-5"><i class="bi bi-x"></i></span></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores cumque, quas ipsum dicta ab ex tempora at? Error, quam consectetur? Minus voluptate esse illum vitae debitis tempora qui nobis consequuntur!</p>
                        <div class="col lh-1">
                            <p class="fw-lighter">Ref: 1</p>
                            <p class="d-flex align-items-center m-0 "><i class="bi bi-check fs-2 text-success"></i> Click & Collect</p>
                            <p class="d-flex align-items-center m-0 "><i class="bi bi-check fs-2 text-success"></i> Home Delivery</p>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-8 d-flex align-items-center">
                                <div class="col-3 me-3">
                                    <select class="form-select text-center" aria-label="Default select example">
                                        <option selected>Size</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                </div>
                                <p class="mt-3 me-3">Quantity: 127</p>
                            </div>
                            <div class="col d-flex align-items-center justify-content-end">
                                IDR 100.000.000
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor

    </div>
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
        FREE returns to any Smyths Toys Suoerstore near you.
    </p>
    <p>
        Please note, some large items (such as bikes, doll houses, playhouses) will be delivered in their original packing which may display images or details Of the contents.
    </p>




</div>
@endsection
