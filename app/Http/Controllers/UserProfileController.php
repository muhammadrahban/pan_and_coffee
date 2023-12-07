<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class UserProfileController extends Controller
{
    function userProfileForm()
    {
        return view('auth.UserProfileForm', ["profile" => auth()->user()]);
    }

    function userProfileUpdate(Request $request)
    {
        $id = auth()->user()->id;
        $validated = $request->validate([
            'full_name' => 'required|max:255',
            // 'last_name' => 'required',
            'email' => 'required|email',
        ]);
        user::where('id', $id)->update([
            // 'first_name' => $request->first_name,
            // 'last_name' => $request->last_name,
            'full_name' => $request->full_name,
            'email' => $request->email,
        ]);
        return redirect(Route('userProfile.Form'))->with('message', 'Profile Updated Successfully');
    }
}
