<?php

namespace App\Http\Controllers;

use App\Models\Couple;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function Game() {
        $user = Auth::user();
        $user->is_played = 1;
        $user->save();

        if(Auth::user()->is_married){
            return redirect()->route('home');
        }

        if(Game::where('player1_id', Auth::user()->id)->exists()){
            if(Game::where('player1_id', Auth::user()->id)->where('player2_id', null)->exists()){
                Game::where('player1_id', Auth::user()->id)->delete();
            }
        } else if(Game::where('player2_id', Auth::user()->id)->exists()){
            DB::table('games')->where('player2_id', Auth::user()->id)->update(['player2_id' => null]);
        }

        if(Game::where('player2_id', null)->whereNot('player1_id', Auth::user()->id)->exists()){

            $game = Game::where('player2_id', null)->whereNot('player1_id', Auth::user()->id)->first();

            if($game->player1->gender != Auth::user()->gender){
                $game->player2_id = Auth::user()->id;
                $game->save();
                $roomId = $game->roomId;
                if( (substr($game->player1->user_id, 0, strlen($game->player1->user_id) - 2) == substr($game->player2->user_id, 0, strlen($game->player2->user_id) - 2)) ){
                    $game->player1->is_married = 1;
                    $game->player2->is_married = 1;
                    $game->player1->save();
                    $game->player2->save();

                    if(Couple::where('user1_id', $game->player1->id)->where('user2_id', $game->player2->id)->exists() or Couple::where('user2_id', $game->player1->id)->where('user1_id', $game->player2->id)->exists()){
                        $game->delete();
                    } else {
                        $couple = new Couple();
                        if($game->player1->gender == 'Male') {
                            $couple->user1_id = $game->player1->id;
                            $couple->user2_id = $game->player2->id;
                        } else{
                            $couple->user1_id = $game->player2->id;
                            $couple->user2_id = $game->player1->id;
                        }
                        $couple->save();
                    }
                }

                return view('tic', compact('roomId'));
            } else{
                $game = new Game();
                $game->player1_id = Auth::user()->id;
                $roomId = uniqid();
                $game->roomId = $roomId;
                $game->save();

                return view('tic', compact('roomId'));
            }
        } else{
            $game = new Game();
            $game->player1_id = Auth::user()->id;
            $roomId = uniqid();
            $game->roomId = $roomId;
            $game->save();

            return view('tic', compact('roomId'));
        }

    } // End of method

    public function Regenerate(){
        $user = Auth::user();
        $user->is_played = 0;
        $user->save();

        if(Game::where('player1_id', Auth::user()->id)->exists()){
            if(Game::where('player1_id', Auth::user()->id)->where('player2_id', null)->exists()){
                Game::where('player1_id', Auth::user()->id)->delete();
            }
            $game = Game::where('player1_id', $user->id)->first();
            $game->player1_id = $game->player2_id;
            $game->player2_id = null;
            $game->save();
        } else if(Game::where('player2_id', Auth::user()->id)->exists()){
            DB::table('games')->where('player2_id', Auth::user()->id)->update(['player2_id' => null]);
        }
    } // End of method

    public function Close(){
        return view('close');
    } // End of method

    public function CheckMarried(){
        return Auth::user()->is_married;
    } // End of method
}
