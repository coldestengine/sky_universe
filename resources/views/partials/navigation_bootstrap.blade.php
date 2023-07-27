<nav class="navbar navbar-expand-lg pt-3 @if(Auth::user()->gender == 'Male') bg-blue @else bg-pink @endif">
    <div class="col-1 ps-5">
        <a class="navbar-brand" href="{{ route('home') }}"><i class="bi bi-arrow-left"></i></a>
    </div>
    <div class="container-fluid mx-2">
        <div class="col-11">
            <div class="container text-center fs-1 heading fw-bold">Sky Universe.</div>
        </div>

    </div>
  </nav>
