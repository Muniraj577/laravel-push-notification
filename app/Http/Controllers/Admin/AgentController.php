<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NotificiationController;
use App\Models\Agent;
use App\Models\Notify;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::latest()->get();
        return view('admin.agent.index', compact('agents'));
    }

    public function create()
    {
        return view('admin.agent.create');
    }

    public function store(Request $request)
    {
        $input = $request->except('_token');
        $agent = Agent::create($input);
        Notify::notify();
        return redirect()->back();
    }
}
