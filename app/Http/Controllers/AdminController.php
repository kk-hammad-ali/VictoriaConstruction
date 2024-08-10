<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $clients = Client::whereNotNull('payment_date')
            ->whereDate('payment_date', '<=', Carbon::now()->subDays(28))
            ->where('status', 1)
            ->get();

        foreach ($clients as $client) {
            $client->status = 0; // Mark as unpaid
            $client->payment_date = null; // Clear the payment date
            $client->save();
        }

        return view('admin.dashboard');
    }

    public function adminLogout(){
        session()->forget('admin_id');
        session()->forget('user');

        return redirect('/login');
    }
}
