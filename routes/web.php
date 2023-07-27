<?php

use App\Http\Controllers\ProfileController;
use App\Models\Couple;
use App\Models\Game;
use App\Models\Cart;
use App\Models\Product;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    if(Auth::user()->is_married){
        $products = Product::all();
        Auth::user()->gender == 'Male' ? $products = Product::where('gender', 'male')->inRandomOrder()->get() : $products = Product::where('gender', 'female')->inRandomOrder()->get();
        $cart = Cart::where('user_id', Auth::user()->id)->count();
        return view('content.index', compact('products', 'cart'));
    } else {
        return redirect()->route('tic');
    }

})->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/get-catalogue', function(Request $request){
        if($request->location == 'All'){
            $products = Product::where('gender', strtolower(Auth::user()->gender))->    inRandomOrder()->get();
        } else{
            $products = Product::where('location', $request->location)->where('gender', strtolower(Auth::user()->gender))->get();
        }
        $html = '';


        foreach ($products as $product){
            $html .=
            '<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url('.asset($product->image).'); ">
                <a href="'.route('item.detail', $product->id).'  ">
                    <div class="case-studies-summary">
                        <h2>'.$product->name.'</h2>
                        <h3><strong class="text-success" style="text-shadow: 1.5px 1.5px #000000;">IDR '.$product->price.'</strong></h3>
                    </div>
                </a>
            </li>';
        }

        return $html;
    });

    Route::get('/item/{product}', function(Product $product){

        return view('content.item', compact('product'));
    })->name('item.detail');

    Route::get('/cart', function(){

        return view('content.cart');
    })->name('item.detail');

    Route::get('/add-to-cart', function(Request $request){
        if(Cart::where('user_id', Auth::user()->id)->where('product_id', $request->item_id)->exists()){
            return response()->json([
                'message' => 'Product already in cart'
            ], 400);
        }
        $product = Product::find($request->item_id);
        $user = Auth::user();

        Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'created_at' => now()
        ]);

        return response()->json([
            'message' => 'Product added to cart'
        ], 200);

    });

    // GAME
    Route::get('/tic', function () {

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

                    $couple = new Couple();
                    if($game->player1->gender == 'Male') {
                        $couple->user1_id = $game->player1->id;
                        $couple->user2_id = $game->player2->id;
                    } else{
                        $couple->user1_id = $game->player2->id;
                        $couple->user2_id = $game->player1->id;
                    }
                    $couple->save();

                    $game->delete();
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

    })->middleware(['auth', 'verified', 'unique.tab.access'])->name('tic');

    Route::get('/regenerate', function(){
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
    });

    Route::get('/close', function(){
        return view('close');
    })->name('close');

    Route::get('/check-married', function(){
        return Auth::user()->is_married;
    });
});


require __DIR__.'/auth.php';
