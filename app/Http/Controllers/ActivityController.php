<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    function activityList()
    {
        // return auth()->user()->id;
        $activity =  Activity::with('user')->where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get();
        return view('Activity.ActivityList', compact('activity'));
    }

    function countNotification()
    {
        $count = Activity::where('user_id', auth()->user()->id)
            ->where('is_viewed', 0)
            ->count();
        return response($count, 200);
    }
}
