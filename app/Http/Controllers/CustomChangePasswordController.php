<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;

class CustomChangePasswordController extends Controller
{

    function updatePasswordForm()
    {
        return view('auth.ChangePassword');
    }
    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate(
            [
                'old_password' => 'required|current_password',
                'new_password' => 'required|confirmed||min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/|different:old_password',
                'new_password_confirmation' => "required"
            ],
            [
                'new_password.confirmed' => "New password and confirm password does not match.",
                'new_password.regex' => "<div class='requirements'>
            <ul>
                <li id='length' class='red'>Include at least 8 digits and three special characters</li>
                <li id='uppercase' class='red'>Include at least one upper case characters (A-Z)</li>
                <li id='lowercase' class='red'>Include at least one lower case character (a-z)</li>
                <li id='numbers' class='red'>Include a number (0-9)</li>
                <li id='symbols' class='red'>Include a symbol (!, #, $, etc.)</li>
            </ul>
        </div>"
            ]
        );


        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return redirect(Route('update.PasswordForm'))->with("message", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect(Route('home'))->with("message", "Password Updated");
    }
}
