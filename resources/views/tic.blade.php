<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic Tac Toe</title>
    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- socket io client -->
    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
</head>
<body>

    <div class="w-screen h-screen text-center grid place-content-center" style="background-color: #114B5F">
        <h1 class="text-3xl font-bold" style="color: #e4fde1">Tic Tac Toe</h1>
        <h1 class="text-sm mb-3" id="message" style="color: #e4fde1">message</h1>
        <div class="gap-2 w-full h-full grid grid-rows-3 grid-cols-3" id="board" style="background-color: #028090">
            <div class="w-32 h-32 text-center text-5xl text-white grid place-content-center border-2">X</div>
        </div>
        <input type="hidden" value="{{ $roomId }}" id="room">
        <button class="rounded-full text-white hidden" id="join-btn">Join Room (Enter Room ID)</button>
        <form class="mt-5" method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link class="bg-red-900 rounded-full text-center text-white" :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#join-btn').click();

            // before unload
            $(window).bind('beforeunload', function(){
                $.ajax({
                    url: '/regenerate',
                    type: 'GET'
                });
            });
        });
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
</html>
