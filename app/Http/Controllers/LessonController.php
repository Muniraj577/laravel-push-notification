<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Notifications\NewLessonNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newLesson(Request $request)
    {
        $input['title'] = 'Laravel Muniraj';
        $input['body'] = "Laravel Notification Learning";
        $input['user_id'] = auth()->user()->id;
        $lesson = Lesson::create($input);
        $user = User::where('id', '!=', auth()->user()->id)->get();
//        $user->notify(new NewLessonNotification(Lesson::latest('id')->first()));
        if (Notification::send($user, new NewLessonNotification(Lesson::latest('id')->first()))){
            return back();
        }
    }
    public function notification()
    {
//        dd(auth()->user()->unreadNotifications);
        return auth()->user()->unreadNotifications;
    }
}
