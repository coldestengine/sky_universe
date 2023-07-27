@extends('layouts.auth')
@section('title')
    Register
@endsection
@section('auth')
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-5">
            <div class="card mb-0">
              <div class="card-body">
                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('logo/dark_logo.png') }}" width="100" alt="">
                </a>
                <p class="text-center">Register Now!</p>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                                <x-input-error :messages="$errors->get('name')" class="text-danger" />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                                <x-input-error :messages="$errors->get('email')" class="text-danger" />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input value="{{ old('phone') }}" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone">
                                <x-input-error :messages="$errors->get('phone')" class="text-danger" />
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                    <option value="-1" selected>Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <x-input-error :messages="$errors->get('gender')" class="text-danger" />
                            </div>
                            <div class="mb-4">
                                <label for="dob" class="form-label">DOB</label>
                                <input value="{{ old('dob') }}" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob">
                                <x-input-error :messages="$errors->get('dob')" class="text-danger" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="dating_code" class="form-label">Dating Code</label>
                                <input value="{{ old('dating_code') }}" type="text" class="form-control @error('dating_code') is-invalid @enderror" name="dating_code">
                                @error('dating_code')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                @if(Session::has('error'))
                                    <p class="text-danger">{{ Session::get('error') }}</p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="profile_image" class="form-label">Profile Image</label>
                                <input id="image" value="{{ old('profile_image') }}" type="file" class="form-control @error('profile_image') is-invalid @enderror" name="profile_image">
                                @error('profile_image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="card" style="width: 9rem">
                                    <img id="showImage" src="{{ asset('image/no-profile.jpg') }}" class="card-img-top rounded-full" alt="..." style="height:9rem; width:9rem;">
                                </div>
                            </div>
                        </div>
                    </div>

                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
                  @if(Session::has('success'))
                    <p class="text-success text-center">{{ Session::get('success') }}</p>
                    @endif
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Sign In</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
