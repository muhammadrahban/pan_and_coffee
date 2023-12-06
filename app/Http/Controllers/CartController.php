<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems  = session()->get('cart', []);
        $arrayCart = [];
        foreach ($cartItems as $key => $value) {
            $products               = Product::where('id', $key)->first();
            $products['quantity']   = $value;
            array_push($arrayCart, $products);
        }
        return response()->json(['data' => $products]);
    }

    public function store(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $cart = $request->session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }
        $request->session()->put('cart', $cart);

        return response()->json(['message' => 'Product added to cart successfully']);
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return response()->json(['message' => 'Items removed from cart']);
    }

    public function clearCart()
    {
        session()->forget('cart');
        return response()->json(['message' => 'Cart cleared']);
    }
}
