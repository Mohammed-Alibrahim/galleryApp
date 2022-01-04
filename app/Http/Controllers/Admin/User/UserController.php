<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $arr['users'] = $users;

        return view('Admin.User.Index_view', $arr);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $input = $request->only('name', 'phone', 'email');
            $input['role'] = 'user';
            $input['password'] = Hash::make($request->input('password'));
            $user = User::create($input);

            return redirect()->back();

        } else {
            return view('Admin.User.Add_view');
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->isMethod('post')) {
            $input = $request->only('name', 'phone', 'email');
            if (!is_null($request->input('password'))) {
                $input['password'] = Hash::make($request->input('password'));
            }
            $user->update($input);

            return redirect()->back();
        } else {
            $arr['user'] = $user;

            return view('Admin.User.Update_view', $arr);
        }
    }

    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->isMethod('post')) {
            $user->delete();

            return redirect(route('User.Index'));
        } else {
            $arr['user'] = $user;

            return view('Admin.User.Delete_view', $arr);
        }
    }
}
