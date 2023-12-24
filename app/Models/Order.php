<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'track_number',
        'address',
        'parcel_image',
        'quantity',
        'status',
        'payment_status',
        'total_amount',
    ];
}
