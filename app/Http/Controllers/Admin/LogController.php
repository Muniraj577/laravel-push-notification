<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserActivity;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = UserActivity::latest()->get();
        return view('admin.log.index', compact('logs'))->with('id');
    }
}
