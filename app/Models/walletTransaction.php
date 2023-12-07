<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class walletTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'wallet_id', 'type', 'amount', 'fdp', 'amount_type', 'amount_method'
    ];



    /**
     * Get the user that owns the walletTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wallet()
    {
        return $this->belongsTo(wallet::class);
    }
}
