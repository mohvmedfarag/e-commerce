<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function all()
    {
        $products = Product::all();
        return view('user.home', compact('products'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('user.show', compact('product'));
    }
    public function search(Request $request)
    {
        $key = $request->key;
        $products = Product::where("name", "like", "%$key%")->get();
        return view('user.home', compact('products'));
    }
    public function addToCart($id, Request $request)
    {
        $qty = $request->qty;

        $product = Product::findOrFail($id);

        $cart = session()->get('cart');

        if (! $cart) {
            # first time
            $cart = [
                $id => [
                    "name" => $product->name,
                    "price" => $product->price,
                    "image" => $product->image,
                    "qty" => $qty,
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back();
        } else {

            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "qty" => $qty,
            ];
            session()->put('cart', $cart);
            return redirect()->back();
        }
    }

    public function myCart()
    {
        $cart = session()->get('cart');
        return view('user.myCart', compact('cart'));
    }

    public function makeOrder(Request $request)
    {
        $user = Auth::user();
        $order = Order::create([
            'user_id' => $user->id,
        ]);
        if (session()->has('cart')) {
            $cart = session()->get('cart');

            foreach ($cart as $id => $product) {
                OrderDetails::create([
                    'order_id' => $order->id,
                    'product_id' => $id,
                    'quantity' => $product['qty'],
                    'price' => $product['price'],
                ]);
            }
        }
        return redirect()->back();
    }

    public function addToWishlist($id)
    {
        $product = Product::findOrFail($id);

        // Retrieve the wishlist from the session
        $wishlist = session()->get('wishlist');

        if (isset($wishlist[$id])) {
            // If the product is already in the wishlist, remove it
            unset($wishlist[$id]);
            session()->put('wishlist', $wishlist);
        } else {
            // If the product is not in the wishlist, add it
            $wishlist[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
            ];
            session()->put('wishlist', $wishlist);
        }

        return redirect()->back();
    }
    public function wishlist()
    {
        $wishlist = session()->get('wishlist');
        return view('user.wishlist', compact('wishlist'));
    }
    public function addToFav($id){
        $product = Product::findOrFail($id);
        $user = Auth::user();

        $isFav = Favorite::where('user_id', $user->id)->where('product_id', $id)->first();

        if (!$isFav) {
            Favorite::create([
                'user_id' => $user->id,
                'product_id' => $id
            ]);
            return redirect()->back();
        } else {
            $isFav->delete();
            return redirect()->back();
        }
        
    }
    
}
