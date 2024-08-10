<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\History;

class HistoryController extends Controller
{
    public function showHistory()
    {
        $clients = History::all();
        return view('admin.history.history', compact('clients'));
    }

    public function storeClientHistory($clientId)
    {
        // Fetch the client by ID
        $client = Client::with(['agent', 'flat'])->findOrFail($clientId);

        // Store specific attributes in the history table

        $client->payment_date = now();

        $history = new History();
        $history->client_name = $client->client_name;
        $history->client_email = $client->client_email;
        $history->primary_phoneNo = $client->primary_phoneNo;
        $history->address = $client->address;
        $history->country = $client->country;
        $history->agent_name = $client->agent->name;
        $history->flat_number = $client->flat->flat_number;
        $history->flat_rent = $client->flat->rent;
        $history->payment_date = $client->payment_date;
        $history->save();

        return redirect()->back()->with('success', 'Client history stored successfully.');
    }

}
