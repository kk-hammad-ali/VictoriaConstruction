<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\Client;
use App\Models\History;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{

    public function index()
    {
        // Mark clients with old payment dates as unpaid
        $clients = Client::whereNotNull('payment_date')
                        ->whereDate('payment_date', '<=', Carbon::now()->subDays(28))
                        ->where('status', 1)
                        ->get();

        foreach ($clients as $client) {
            $client->status = 0; // Mark as unpaid
            // Optionally clear the payment_date
            // $client->payment_date = null;
            $client->save();
        }

        // Retrieve dashboard statistics
        $totalAgents = User::where('role', 1)->count();
        $totalProperties = Property::count();
        $totalClients = Client::count();
        $totalEarnings = DB::table('rents')->sum('amount_received');

        // Get the 5 most recent rows from History with clients having client_status = 1
        $recentClients = History::join('clients', 'history.client_id', '=', 'clients.id')
                                ->where('clients.status', 1) // Filter by client_status
                                ->orderBy('history.created_at', 'desc')
                                ->limit(5)
                                ->get([
                                    'history.*', // Select all fields from history
                                    'clients.client_name', // Optionally select fields from clients
                                    'clients.client_email'
                                ]);

        return view('admin.dashboard', [
            'totalAgents' => $totalAgents,
            'totalProperties' => $totalProperties,
            'totalClients' => $totalClients,
            'totalEarnings' => $totalEarnings,
            'clients' => $recentClients,
        ]);
    }

    public function adminLogout(){
        session()->forget('admin_id');
        session()->forget('user');

        return redirect('/login');
    }

    public function changePassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if old password matches
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return redirect()->back()->with('error_custom', 'Old password does not match.')->withInput();
        }

        // Update with new password
        $user = auth()->user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('password_changed_custom', 'Password successfully updated.');
    }
}
