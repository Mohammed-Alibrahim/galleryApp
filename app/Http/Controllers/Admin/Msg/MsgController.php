<?php

namespace App\Http\Controllers\Admin\Msg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MsgController extends Controller
{
    public function index($type)
    {
        $user = Auth::user();

        switch ($type) {
            case 'All':
                $msgs = $user->Notifications;
                break;
            case 'Read':
                $msgs = $user->readNotifications;
                break;
            case 'UnRead':
                $msgs = $user->unReadNotifications;
                break;
            default:
                return redirect()->back();
        }
        $arr['msgs'] = $msgs;

        return view('Admin.Msg.Index_view', $arr);
    }

    public function read($id)
    {
        $user = Auth::user();
        $msg = $user->Notifications()->find($id);
        $msg->markAsRead();
        $arr['msg'] = $msg;

        return view('Admin.Msg.Read_view', $arr);
    }

    public function delete($id)
    {
        $user = Auth::user();
        $msg = $user->Notifications()->find($id);
        $msg->delete();

        return redirect()->back();
    }
}
