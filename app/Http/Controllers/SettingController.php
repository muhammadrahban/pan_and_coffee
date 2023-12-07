<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function getsettings()
    {
        $setting = Settings::latest()->first();
        return view('SettingManagement', compact('setting'));
    }

    function update(Request $request, Settings $setting)
    {
        $validateData = $request->validate([
            'model_fdp'     => 'required',
            'platform_fdp' =>  'required'
        ]);
        $setting->update($validateData);
        return redirect(route('setting.list'))->with('message', 'settings updated successfully');
    }
}
