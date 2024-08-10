<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\Client;
use App\Models\History;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $totalAgents = User::where('role', 1)->count();
        $totalProperties = Property::count();
        $totalClients = Client::count();

        // Get the 5 most recent rows from History
        $clients = History::orderBy('created_at', 'desc')->limit(5)->get();

        $totalEarnings = DB::table('clients')
            ->join('flats', 'clients.flat_id', '=', 'flats.id')
            ->whereNotNull('clients.payment_date')
            ->sum('flats.rent');

        return view('admin.dashboard', [
            'totalAgents' => $totalAgents,
            'totalProperties' => $totalProperties,
            'totalClients' => $totalClients,
            'totalEarnings' => $totalEarnings,
            'clients' => $clients,
        ]);
    }


    public function adminLogout(){
        session()->forget('admin_id');
        session()->forget('user');

        return redirect('/login');
    }
}
