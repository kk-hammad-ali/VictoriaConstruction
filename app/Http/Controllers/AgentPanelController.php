<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgentPanelController extends Controller
{
    public function index()
    {
        return view('agent.dashboard');
    }
}
