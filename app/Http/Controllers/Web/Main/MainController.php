<?php

namespace App\Http\Controllers\Web\Main;

use App\Http\Controllers\Controller;
use App\Models\Model\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
        $user = Auth::user();
        $sections = Section::all();
        $arr['user'] = $user;
        $arr['sections'] = $sections;

        return view('Web.Main.Main_view', $arr);
    }
}
