<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'card_id',
        'card_number',
        'card_holder_name',
        'card_expiry_date',
        'card_cvv',
        'last_4',
        'brand',
        'is_default',
        'status',
        'response'
    ];
}
