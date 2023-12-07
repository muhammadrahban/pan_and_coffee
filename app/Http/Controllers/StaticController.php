<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function gallery() {
        return view('gallery');
    }

    public function contact() {
        return view('contact');
    }

    public function store() {
        $products   = Product::all();
        return view('store', compact('products'));
    }

    public function privacyPolicy() {
        return view('privacy_policy');
    }
}
