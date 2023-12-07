<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public static function media($request, $folder = "")
    {
        $extension = $request->file('image')->getClientOriginalExtension();
        return $request->file('image')->storeAs(
            $folder,
            Str::random(20) . '.' . $extension,
            env('DISK')
        );
    }
}
