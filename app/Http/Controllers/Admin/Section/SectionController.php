<?php

namespace App\Http\Controllers\Admin\Section;

use App\Http\Controllers\Controller;
use App\Models\Model\Post;
use App\Models\Model\Section;
use App\Models\User;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::select('id', 'name', 'admin')->get();
        $arr['sections'] = $sections;

        return view('Admin.Section.Index_view', $arr);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $section = Section::create($request->all());
            if (!is_null($request->input('admin'))) {
                $user = User::find($request->input('admin'));
                $user->role = 'editor';
                $user->update();
            }

            return redirect()->back();
        } else {
            $users = User::select('id', 'name')->where('role', 'user')->get();
            $arr['users'] = $users;

            return view('Admin.Section.Add_view', $arr);
        }
    }

    public function update(Request $request, $id)
    {
        $section = Section::find($id);
        if ($request->isMethod('post')) {
            $section->name = $request->input('name');
            if (!is_null($section->admin)) {
                $old_admin = User::find($section->admin);
                $old_admin->role = 'user';
                $old_admin->update();
            }
            $section->admin = $request->input('admin');
            if (!is_null($request->input('admin'))) {
                $admin = User::find($request->input('admin'));
                $admin->role = 'editor';
                $admin->update();
            }
            $section->update();

            return redirect()->back();
        } else {
            $users = User::select('id', 'name')->where('role', 'user')->get();
            $arr['users'] = $users;
            $arr['section'] = $section;

            return view('Admin.Section.Update_view', $arr);
        }
    }

    public function delete(Request $request, $id)
    {
        $section = Section::find($id);
        if ($request->isMethod('post')) {
            $section->delete();

            return redirect(route('Section.Index'));
        } else {
            $arr['section'] = $section;

            return view('Admin.Section.Delete_view', $arr);
        }
    }
}
