@extends('layouts.admin')
@section('title', 'Edit Users')
@section('admin')
<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Edit User: anjay halo</h5>
        <div class="card">
          <div class="card-body">
            <form action="{{ route('update.user') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input name="name" value="{{ $user->name }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input name="phone" value="{{ $user->phone }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">DOB</label>
                <input name="dob" value="{{ $user->dob }}" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
