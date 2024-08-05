<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function adminAllClient()
    {
        return view('admin.clients.all-clients');
    }
    public function adminAddClient()
    {
        return view('admin.clients.add-clients');
    }

    public function editAdminClient($id)
    {
        // $client = Clients::findOrFail($id);
        // compact('client')
        return view('admin.clients.edit-clients');
    }

    // AGENT
    public function agentAllClient()
    {
        return view('agent.client.all-client');
    }
    public function agentAddClient()
    {
        return view('agent.client.add-client');
    }
}
