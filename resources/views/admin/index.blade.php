@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('admin')
<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
        <div class="card-body p-4">
          <h5 class="card-title fw-semibold mb-4">Manage User</h5>
          <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
              <thead class="text-dark fs-4">
                <tr>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">User ID</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Name</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Gender</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Status</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Married</h6>
                  </th>
                  <th class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">Action</h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($users as $user)
                      @if($user->id !== Auth::user()->id)
                      <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $user->user_id }}</h6></td>
                      <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1">{{ $user->name }}</h6>
                      </td>
                      <td class="border-bottom-0">
                          <p class="mb-0 fw-normal">{{ $user->gender }}</p>
                      </td>
                      <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                          <span class="badge {{ $user->is_banned == 1 ? 'bg-danger' : 'bg-success' }} rounded-3 fw-semibold">{{ $user->is_banned == 1 ? 'banned' : 'active'}}</span>
                          </div>
                      </td>
                      <td class="border-bottom-0">
                          <span class="badge {{ $user->is_married == 0 ? 'bg-info' : 'bg-warning' }} rounded-3 fw-semibold">{{ $user->is_married == 0 ? 'single' : 'married' }}</span>
                      </td>
                      <td class="border-bottom-0">
                        <div class="col">
                            <form class="p-0 m-0" action="{{ $user->is_banned ? route('unban.user') : route('ban.user') }}" method="POST">
                                @csrf
                                <a class="btn btn-info" href="{{ route('edit.user', $user->id) }}">Edit</a>
                                <input name="id" type="hidden" value="{{ $user->id }}">
                                <button type="submit" class="btn {{ $user->is_banned ? 'btn-warning' : 'btn-danger' }}">{{ $user->is_banned ? 'Unban' : 'Ban' }}</button>
                          </form>
                        </div>
                      </td>
                      </tr>
                      @endif
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

