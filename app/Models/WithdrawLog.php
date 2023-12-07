<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawLog extends Model
{
    protected $fillable = ['user_id', 'payout_batch_id', 'batch_status', 'sender_batch_id', 'currency', 'amount', 'receiver_email', 'links'];

    // Rest of the model code...
}
