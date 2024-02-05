<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    function index()
    {
        $orders =  Order::with('user', 'orderDetail.product')->get();
        return view('order.OrderList', compact('orders'));
    }
    function update(Request $request, $id)
    {
        Order::where('id', $id)->update(['status' => $request->status]);
        return response()->json(['data' => 'done', 200]);
    }

    function detail($order)
    {
        // Use optional to handle the case where Order::find($order) returns null
        $orderDetails = optional(Order::find($order))->load('user', 'orderDetail.product');
        return view('order.OrderDetail', compact('orderDetails'));
    }
}
