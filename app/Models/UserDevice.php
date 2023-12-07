<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDevice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'udid',
        'device_token',
        'device_type',
        'access_token',
        'device_brand',
        'device_os',
        'app_version',
        'is_notify',

    ];
}
