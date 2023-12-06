<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems  = session()->get('cart', []);
        $currency   = session()->get('currency');
        $ids = array_keys($cartItems);
        $foundItems = victim::whereIn('id', $ids);
        $count      = $foundItems->count();
        $foundItems = $foundItems->get();
        $initial_amount = 300000;
        foreach ($foundItems as $key => $value) {
            if ($currency != 'PKR') {
                $amount = $this->currency($initial_amount, 'PKR', $currency);
            } else {
                $amount = $initial_amount;
            }
            $foundItems[$key]['price']  = $amount;
        }
        return view('web.cart.cart', compact('foundItems', 'count'));
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
        return redirect(route('cart.index'))->with('success', 'Items removed from cart');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect('/cart')->with('success', 'Cart cleared');
    }
}
