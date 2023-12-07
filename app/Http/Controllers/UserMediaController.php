<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserMedia;
use App\Events\SendAction;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UserMediaController extends Controller
{
    function mediaAprove($userMedia)
    {
        $isempty =  UserMedia::where("user_id", $userMedia)->count();
        if ($isempty > 0) {
            User::where('id', $userMedia)->update([
                'is_verified'    => "1",
                // 'verification_status'    => "approved"
            ]);
            event(new SendAction([$userMedia], [
                'actor_id' => auth()->user()->id,
                'actor_type' => 'admin',
                'user_id' => $userMedia,
                'object_id' => $userMedia,
                'title' => 'approve_media',
                'object_type' => 'App\Models\User',
                'type' => 'approve_media',
                // 'media' => $media,
                // 'object_id' => '',
                'body' => "Approved Media Successfully ",
            ], true));
            return redirect(Route('user.list'))->with('message', "Approved Media Successfully");
        } else {
            return redirect(Route('user.list'))->with('error', "User Media is not Available");
        }
    }
    function mediaDelete($userMedia)
    {
        $isempty =  UserMedia::where("user_id", $userMedia)->count();
        if ($isempty > 0) {
            UserMedia::where("user_id", $userMedia)->delete();
            User::where('id', $userMedia)->update([
                'is_verified'    => '2',
                // 'verification_status'    => 'rejected'
            ]);
            event(new SendAction([$userMedia], [
                'actor_id' => auth()->user()->id,
                'actor_type' => 'admin',
                'user_id' => $userMedia,
                'object_id' => $userMedia,
                'title' => 'approve_media',
                'object_type' => 'App\Models\User',
                'type' => 'reject_media',
                // 'media' => $media,
                // 'object_id' => '',
                'body' => "Reject Media Successfully ",
            ], true));
            return redirect(Route('user.list'))->with('message', "Reject Media Successfully");
        } else {
            return redirect(Route('user.list'))->with('error', "User Media is not Available");
        }
    }
}
