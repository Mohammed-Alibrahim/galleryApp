<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Model\Comment;
use App\Models\Model\Post;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email')->orderBy('id','desc')->take(5)->get();
        $posts = Post::select('id', 'title', 'user_id')->orderBy('id','desc')->take(5)->get();
        $comments = Comment::orderBy('id','desc')->take(5)->get();
        $arr['users'] = $users;
        $arr['posts'] = $posts;
        $arr['comments'] = $comments;

        return view('Admin.Main_view', $arr);
    }
}
