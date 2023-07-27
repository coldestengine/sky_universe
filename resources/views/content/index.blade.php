@extends('layouts.main_master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
            <span>Our Collection</span>
            <h2>Dress Catalogue</h2>
            <p>Dresses that Captivate: Unveiling the Collection</p>
            <select class="form-select" id="select-location">
                <option value="All" selected>Location</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Singapore">Singapore</option>
            </select>
        </div>
    </div>
    <div class="row row-bottom-padded-md">
        <div class="col-md-12">
            <ul id="fh5co-gallery-list">
                @php
                    $i = 1;
                @endphp
                @foreach ($products as $item)
                <li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url({{ asset($item->image) }}); ">
                    <a href="{{ route('item.detail', $item->id) }}">
                        <div class="case-studies-summary">
                            <h2>{{ $item->name }}</h2>
                            <h3><strong class="text-success" style="text-shadow: 1.5px 1.5px #000000;">IDR {{ $item->price }}</strong></h3>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<script src="{{ asset('assets/home/js/catalogue.js') }}"></script>
@endsection
