<?php

namespace App\Http\Controllers\Admin\Image;

use App\Http\Controllers\Controller;
use App\Models\Model\Photo;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        $arr['photos'] = $photos;

        return view('Admin.Image.Index_view', $arr);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $photo = $request->file('photo');
            $path = $photo->storeAs('post', $photo->getClientOriginalName(), 'images');
            Photo::create([
                'path' => $path,
            ]);

            return redirect()->back();
        } else {

            return view('Admin.Image.Add_view');
        }
    }

    public function delete(Request $request, $id)
    {
        $photo = Photo::find($id);
        if ($request->isMethod('post')) {
            try {
                unlink(public_path('/images/' . $photo->path));
                $photo->delete();
            } catch (\Exception $exception) {
            }

            return redirect(route('Image.Index'));
        } else {
            $arr['photo'] = $photo;
            return view('Admin.Image.Delete_view', $arr);
        }
    }
}
