<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Model\Photo;
use App\Models\Model\Post;
use App\Models\Model\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('section_id', 'like', $this->getFlag())->get();
        $arr['posts'] = $posts;

        return view('Admin.Post.Index_view', $arr);
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        if ($request->isMethod('post')) {
            $section = Section::find($request->input('section_id'));
            if ($user->can('controlPost', $section)) {
                $post = $user->Posts()->create($request->all());
                $post->Photos()->attach($request->input('photos'));

                return redirect()->back();
            } else {
                return view('errors.404');
            }
        } else {
            $sections = Section::where('id', 'like', $this->getFlag())->get();
            $arr['sections'] = $sections;
            $photos = Photo::all();
            $arr['photos'] = $photos;

            return view('Admin.Post.Add_view', $arr);
        }
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $user = Auth::user();
        if (is_null($post)) {
            return view('errors.404');

        } elseif ($user->can('controlPost', $post->Section)) {
            if ($request->isMethod('post')) {
                $post->update($request->all());
                $post->Photos()->detach();
                $post->Photos()->attach($request->input('photos'));

                return redirect()->back()->with('msg', 'Done!');
            } else {
                $sections = Section::where('id', 'like', $this->getFlag())->get();
                $arr['post'] = $post;
                $arr['sections'] = $sections;
                $photos = Photo::all();
                $arr['photos'] = $photos;

                return view('Admin.Post.Update_view', $arr);
            }
        }
    }

    public function delete(Request $request, $id)
    {
        $user = Auth::user();
        $post = Post::find($id);
        $section = $post->Section;
        if ($user->can('controlPost', $section)) {
            if ($request->isMethod('post')) {
                $post->delete();

                return redirect(route('Post.Index'));
            } else {
                $arr['post'] = $post;

                return view('Admin.Post.Delete_view', $arr);
            }
        } else {
            return view('errors.404');
        }
    }

    protected function getFlag()
    {
        $user = Auth::user();
        $flag = '%';
        if ($user->role == 'editor') {
            $flag = '';
            if (!is_null($user->Section)) {
                $flag = $user->Section->id;
            }
        }

        return $flag;
    }
}
