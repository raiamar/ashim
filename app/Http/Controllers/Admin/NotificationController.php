<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    public function markRead($noti_id)
    {
        $notification = DatabaseNotification::where('id', $noti_id)->first();
        $link = $notification->data['link'];
        $notification->markAsRead();
        return redirect($link);
    }
}
