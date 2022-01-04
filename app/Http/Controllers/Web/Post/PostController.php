<?php

namespace App\Http\Controllers\Web\Post;

use App\Http\Controllers\Controller;
use App\Models\Model\Comment;
use App\Models\Model\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request, $id)
    {
        $post = Post::find($id);
        if ($request->isMethod('post')) {
            $post->Comments()->create([
                'content' => $request->input('content'),
                'user_id' => Auth::user()->id,
            ]);

            return redirect()->back();
        } else {
            $user = Auth::user();
            $arr['post'] = $post;
            $arr['comments'] = $post->Comments;
            $arr['user'] = $user;

            return view('Web.Post.Index_view', $arr);
        }
    }

    public function editComment(Request $request, $id)
    {
        $comment = Comment::find($id);
        $user = Auth::user();
        $section = $comment->Post->Section;
        $post = $comment->Post;
        if ($user->can('editComment', $comment) or $user->can('controlPost', $section)) {
            if ($request->isMethod('post')) {
                $comment->update($request->all());

                return redirect(route('Web.Post.Index', ['id' => $post->id]));
            } else {
                $arr['user'] = $user;
                $arr['comment'] = $comment;
                $arr['post'] = $post;

                return view('Web.Post.Edit_comment_view', $arr);
            }
        } else {
            return view('errors.404');
        }
    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id);
        $user = Auth::user();
        $section = $comment->Post->Section;
        if ($user->can('editComment', $comment) or $user->can('controlPost', $section)) {
            $comment->delete();

            return redirect()->back();
        } else {
            return view('errors.404');        }
    }
}
