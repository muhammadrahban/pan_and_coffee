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
}
