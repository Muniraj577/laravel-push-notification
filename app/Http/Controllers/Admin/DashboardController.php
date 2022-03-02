<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Category;
use App\Models\City;
use App\Models\College;
use App\Models\Council;
use App\Models\University;
use App\Models\Visit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalUser = Admin::count();
        return view('admin.dashboard.dashboard', compact('totalUser'));
    }
}
