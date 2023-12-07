<?php

namespace App\Models;

use App\Models\Settings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class wallet extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'user_id', 'currency', 'amount', 'fdp'
    ];

    protected $appends = [
        'total_amount'
    ];

    function getTotalAmountAttribute()
    {
        $modelFdp = Settings::first('model_fdp');
        $dynamicConversionRate = (1 / ($modelFdp->model_fdp ?: 10)); // Use parentheses to group the ternary operation
        $amount = $this->fdp * $dynamicConversionRate;
        $dollarValue = round($amount, 1);
        return $dollarValue;
    }
    /**
     * Get the transactions associated with the wallet
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transactions()
    {
        return $this->hasMany(walletTransaction::class);
    }
}
