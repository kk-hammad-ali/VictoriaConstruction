<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Flat;

class AgentPanelController extends Controller
{
    public function index()
    {
        $agentId = Auth::id(); // Get the logged-in agent's ID

        // Count the total clients assigned to this agent
        $totalClients = Client::where('agent_id', $agentId)->count();

        // Count the total rents received for this agent's clients
        $rentsReceived = Client::where('agent_id', $agentId)
            ->whereNotNull('payment_date')
            ->count();

        // Count the total rents pending for this agent's clients
        $rentsPending = Client::where('agent_id', $agentId)
            ->whereNull('payment_date')
            ->count();

        return view('agent.dashboard', [
            'totalClients' => $totalClients,
            'rentsReceived' => $rentsReceived,
            'rentsPending' => $rentsPending
        ]);
    }
}
