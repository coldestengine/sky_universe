<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function Index() {
        if(Auth::user()->is_married){
            $products = Product::all();
            Auth::user()->gender == 'Male' ? $products = Product::where('gender', 'male')->inRandomOrder()->get() : $products = Product::where('gender', 'female')->inRandomOrder()->get();
            $cart = Cart::where('user_id', Auth::user()->id)->count();
            return view('content.index', compact('products', 'cart'));
        } else {
            return redirect()->route('tic');
        }
    } // End of method

    public function GetCatalogue(Request $request) {
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
    } // End of method

    public function ItemDetail(Product $product) {
        return view('content.item', compact('product'));
    } // End of method

    public function Cart() {
        $products = Cart::where('user_id', Auth::user()->id)->get();
        $product = null;
        $total = $products->sum('product.price');
        return view('content.cart', compact('products', 'product', 'total'));
    } // End of method

    public function Purchase(Request $request) {
        $product = Product::find($request->item_id);
        $products = null;

        return view('content.cart', compact('products', 'product'));
    } // End of method

    public function AddToCart(Request $request) {
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
    } // End of method

    public function DeleteCart(Request $request){
        Cart::where('user_id', Auth::user()->id)->where('product_id', $request->id)->delete();

        return response()->json([
            'message' => 'Product deleted from cart'
        ], 200);
    } // End of method

    public function Checkout(){
        Cart::where('user_id', Auth::user()->id)->delete();
        return redirect()->route('home');
    }
}
