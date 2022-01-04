<?php

namespace App\Http\Controllers\Web\Section;

use App\Http\Controllers\Controller;
use App\Models\Model\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        $section = Section::find($id);
        $posts = $section->Posts;
        $arr['posts'] = $posts;
        $arr['user'] = $user;

        return view('Web.Section.Index_view', $arr);
    }
}
