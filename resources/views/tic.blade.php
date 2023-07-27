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

    <div class="bg-gray-900 w-screen h-screen text-center grid place-content-center">
        <h1 class="text-3xl text-white font-bold">Tic Tac Toe</h1>
        <h1 class="text-sm text-white mb-3" id="message">message</h1>
        <div class="bg-gray-800 gap-2 w-full h-full grid grid-rows-3 grid-cols-3" id="board">
            <div class="w-32 h-32 text-center text-5xl text-white grid place-content-center border-2">X</div>
        </div>
        <input type="hidden" value="{{ $roomId }}" id="room">
        <button class="rounded-full text-white hidden" id="join-btn">Join Room (Enter Room ID)</button>
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
