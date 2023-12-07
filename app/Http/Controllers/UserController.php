<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use App\Models\UserVehicle;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Models\VehicleCategory;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    function getUsers()
    {
        $userData = User::where('user_type', "user")->orderby('created_at', 'desc')->get();
        return view('User.UserList', compact('userData'));
    }


    function nannyinfo($nanny, $isView = 0, $type = '')
    {
        if ($isView == 1) {
            Activity::where('actor_id', $nanny)
                ->where('type', $type)
                ->update([
                    'is_viewed' => 1,
                ]);
        }
        $userData = User::with('orders.orderDetail.product')->where('id', $nanny)->orderBy('created_at', 'desc')->get();
        return view('User.UserInfo', compact('userData'));
    }


    function deleteNanny(user $nannies)
    {
        $nannies->delete();
        return redirect(Route('user.list'))->with("message", "Caregiver Deleted successfully");
    }




    function editNanny(user $nannies)
    {
        return view('User.Userupdate', compact('nannies'));
    }
    function updateuser(Request $req, user $nannies)
    {
        $req->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($nannies->id)
            ]
        ]);
        // $up['first_name']   = $req->first_name;
        // $up['lastt_name']   = $req->last_name;
        $up['full_name']    = $req->full_name;
        $up['phone']        = $req->phone;
        $up['email']        = $req->email;
        // $up['dob']          = $req->dob;

        if (!empty($req->password)) {
            $req->validate(
                [
                    'password' => 'min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{6,}$/',
                    'password_confirmation' => 'required_with:password',
                ],
                [
                    'password.regex' => "<div class='requirements'>
                    <ul>
                        <li id='length' class='red'>Include at least 8 digits</li>
                        <li id='uppercase' class='red'>Include at least one upper case characters (A-Z)</li>
                        <li id='lowercase' class='red'>Include at least one lower case character (a-z)</li>
                        <li id='numbers' class='red'>Include a number (0-9)</li>
                    </ul>
                </div>"
                ]
            );
            $up['password'] = bcrypt($req->password);
        }


        $nannies->update($up);
        return redirect(Route('user.list'))->with("message", "Caregiver updated suceesfully");
    }
}
