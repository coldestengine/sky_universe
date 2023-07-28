@extends('layouts.admin')
@section('title', 'Edit Users')
@section('admin')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit User: {{ $user->user_id }}</h5>
        <div class="card">
          <div class="card-body">
            <form action="{{ route('update.user') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input disabled value="{{ $user->email }}" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" value="{{ $user->name }}" type="text" class="form-control" id="name" aria-describedby="emailHelp">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input name="phone" value="{{ $user->phone }}" type="text" class="form-control" id="phone" aria-describedby="emailHelp">
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="dob" class="form-label">DOB</label>
                <input name="dob" value="{{ $user->dob }}" type="date" class="form-control" id="dob" aria-describedby="emailHelp">
                @error('dob')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
