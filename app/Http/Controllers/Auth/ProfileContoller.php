<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\True_;

class ProfileContoller extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::user();
        if ($request->isMethod('post')) {
            if ($this->check($request->input('c_password'))) {
                $user->update([
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                ]);
                if(!is_null($request->input('password')) and $request->input('password') == $request->input('password_confirmation')){
                    $user->password = Hash::make($request->input('password'));
                    $user->update();
                }

                return redirect()->back();
            } else {
                return view('errors.404');
            }
        } else {
            $arr['user'] = $user;

            return view('Web.Auth.Profile_view', $arr);
        }
    }

    public function check($password)
    {
        if (Hash::check($password, Auth::user()->getAuthPassword())) {
            return true;
        }
        return false;
    }
}
