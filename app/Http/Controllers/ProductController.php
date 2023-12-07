<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();
        return view('Product.productList', compact('products'));
    }
}
