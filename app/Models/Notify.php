<?php

namespace App\Models;

use App\Notifications\AgentCreatedNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class Notify extends Model
{
    use HasFactory;

    public static function notify()
    {
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $user = Auth::guard('admin')->user();
        $avatar = asset('images/admin/avatars/' . $user->avatar);
        $user_name = $user->name;
        $msg = $user_name . 'created a user';
        $notification['msg'] = $msg;
        $notification['user_name'] = $user_name;
        $notification['avatar'] = $avatar;
        $user->notify(new AgentCreatedNotification($notification));
        $data['message'] = $msg;
        $data['user_name'] = $user_name;
        $data['avatar'] = $avatar;
        $pusher->trigger('notify-channel', 'App\\Events\\Notify', $data);
    }
}
