<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\Donation;
use App\Models\GeneralDonation;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reward;
use App\Models\Survey;
use App\Models\User;
use App\Models\VehicleCategory;
use App\Models\Victim;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $countData = [
            "user" => user::where('user_type', 'user')->count(),
            "product" => product::count(),
            "order" => Order::count(),
        ];
        return view('home', compact('countData'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
}
