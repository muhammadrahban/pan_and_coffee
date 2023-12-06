<?php

namespace App\Http\Controllers;

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
        return view('store');
    }

    public function privacyPolicy() {
        return view('privacy_policy');
    }
}
