<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use App\Helpers\Helper;
use App\Models\Donation;
use App\Models\UserDevice;
use App\Models\WithdrawLog;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'full_name',
        // 'last_name',
        'address',
        'referral_code',
        'spin_count',
        // 'forgot_password_code',
        'email',
        'social_id',
        'provider',
        'phone',
        'password',
        'gender',
        'dob',
        'profile_image',
        'customer_stripe_id',
        'user_type',
        'user_role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /**
     * The booted method of the model
     */
    protected static function booted()
    {
        static::creating(function ($user) {
            $user->verification_code = mt_rand(10000, 99999);
            $user->phone_verification_code = mt_rand(10000, 99999);
            $user->expired_at = Carbon::now()->addMinutes(60);
        });
    }


    public function verifyUser()
    {
        $this->phone_verified_at = now();
        $this->phone_verification_code = NULL;
        $this->save();
    }

    /**
     * Set password encryption when insert
     *
     * @param $password
     */
    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }

    /**
     * Get formatted timestamp of email_verified_at
     *
     * @param $date
     * @return string
     */
    public function getExpiredAtAttribute($date)
    {
        if ($date !== null) {
            return Carbon::parse($date)->format('Y-m-d H:i:s');
        }
    }

    /**
     * Mark user verified
     */
    public function markUserVerified()
    {
        $this->verification_code = null;
        $this->expired_at = null;
        $this->email_verified_at = now();

        $this->save();
    }

    /**
     * Check if verification code is not expired
     *
     * @return bool
     */
    public function hasValidCode()
    {
        return $this->verification_code !== null && Carbon::parse($this->expired_at)->addMinutes(60) > now();
    }







    public function userDevice($request, $access_token)
    {
        $request['access_token'] = $access_token;
        $this->devices()->updateOrCreate(
            $request->only('udid'),
            $request->all()
        );
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }



    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}
