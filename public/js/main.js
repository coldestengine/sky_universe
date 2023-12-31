let user = null;
let users = [];

let turn = '';
let board = [];
let socket = io('http://localhost:3000', [{
    transports: ['websocket'],
}]);

socket.on('connect', () => {
    // Code to handle socket connection
    // For example, you can display a message that the connection is established.
    document.getElementById('message').innerHTML = 'Connected';
});

socket.on('roomFull', () => {
    // Code to handle the event when the room is full.
    document.getElementById('message').innerHTML = 'Room is full';
});

socket.on('setUser', (data) => {
    // Code to handle when the user's information is set.
    user = data;
});

socket.on('start', (data) => {
    // Code to handle when the game starts.
    users = data.users;
    turn = data.turn;
    board = data.board;
    renderBoard();

    if(users.length === 1){
        document.getElementById('message').innerHTML = 'Waiting for another player to join...';
        document.getElementById('board').classList.add('hidden');
    } else {
        document.getElementById('message').innerHTML = 'You are ' + user.symbol + ' and you are player ' + user.number + '';
    }
});

socket.on('turn', (data) => {
    // Code to handle when it's a player's turn.
    turn = data.turn;

    $.ajax({
        url: '/check-married',
        type: 'GET',
        success: function (response) {
            console.log(response);
            if (response == 1) {
                window.location.href = '/';
            }
        }
    });

    if(data.users.length === 1){
        document.getElementById('message').innerHTML = 'Waiting for another player to join...';
        document.getElementById('board').classList.add('hidden');
    } else if (data.users.length === 2) {
        document.getElementById('message').innerHTML = 'You are ' + user.symbol + ', It is ' + turn + ' turn';
        document.getElementById('board').classList.remove('hidden');
    }
});

socket.on('move', (data) => {
    // Code to handle when a move is made.
    turn = data.turn;
    board = data.board;
    renderBoard();
});

socket.on('winner', (data) => {
    // Code to handle when there's a winner.
    document.getElementById('message').innerHTML = data + ' won, please refresh the page to play again';
});

socket.on('waiting', () =>{
    // Code to handle when waiting for another player to join.
    console.log('waiting');
    // hide board

});

socket.on('resetGame', (user) => {
    // Code to handle when the game needs to be reset (e.g., one user leaves).
    users = [user];
    turn = 'X';
    board = ['', '', '', '', '', '', '', '', ''];
    renderBoard();
    document.getElementById('message').innerHTML = 'The other player has left, please refresh the page!';
    document.getElementById('board').classList.add('hidden');
});

socket.on('disconnect', () => {
    // Code to handle disconnection.
    document.getElementById('message').innerHTML = 'Disconnected';
});

document.getElementById('join-btn').addEventListener('click', () => {
    document.getElementById('join-btn').disabled = true;
    // Code to handle the "Join" button click.
    // Get the value of the button (room ID) from the HTML.
    const roomId = document.getElementById('room').value;
    joinRoom(roomId);
});

// Function to join a room
function joinRoom(roomId) {
    if (!roomId) {
        document.getElementById('message').innerHTML = 'Invalid Room ID';
        document.getElementById('join-btn').disabled = false;
        return;
    }

    socket.emit('joinRoom', roomId);
}

function renderBoard() {
    let boardDiv = document.getElementById('board');
    let boardHTML = '';
    for (let i = 0; i < board.length; i++) {
        boardHTML += `<div onclick="handleClick(${i})" class="w-32 h-32 text-center text-5xl text-white grid place-content-center border-2" style="background-color:${board[i] === 'O' ? '#456990' : board[i] === 'X' ? '#f45b69' : ''};">${board[i]}</div>`;
    }
    boardDiv.innerHTML = boardHTML;
}

function handleClick (i) {
    if (board[i] === '' && turn === user.symbol) {
        board[i] = user.symbol;
        socket.emit('move', {
            turn: turn,
            board: board,
            i: i
        });
    }
}

window.onload = function () {
    renderBoard();
};
