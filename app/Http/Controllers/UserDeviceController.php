<?php

namespace App\Http\Controllers;

use App\Models\UserDevice;
use Illuminate\Http\Request;

class UserDeviceController extends Controller
{
    public function setDeviceToken(Request $request)
    {
        if ($request->has('udid', 'device_token', 'device_type')) {
            auth()->user()->devices()->updateOrCreate(
                [
                    'device_token' => $request->device_token,
                    // 'user_type' => 'App\Models\Users'
                ],
                $request->only('udid', 'device_token', 'device_type', 'access_token')
            );

            return response()->json(true);
        }

        return response()->json(false);
    }

    public function removeDeviceToken(Request $request)
    {
        auth()->user()->devices->each(function ($device_token, $key) {
            $device_token->delete();
        });
        // if( $request->has(['device_token']) ){
        //     auth()->user()->devices()
        //     ->where($request->only('device_token') )->delete();

        //     return response()->json(true);
        // }

        return response()->json(true);
    }
}
