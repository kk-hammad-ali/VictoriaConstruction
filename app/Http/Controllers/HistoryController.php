<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\History;
use App\Models\Rent;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class HistoryController extends Controller
{
    public function showHistory()
    {
        $clients = History::select(
            'client_email',
            \DB::raw('MAX(client_name) as client_name'),
            \DB::raw('MAX(primary_phoneNo) as primary_phoneNo'),
            \DB::raw('MAX(address) as address'),
            \DB::raw('MAX(country) as country'),
            \DB::raw('MAX(agent_name) as agent_name'),
            \DB::raw('MAX(flat_number) as flat_number'),
            \DB::raw('MAX(flat_rent) as flat_rent'),
            \DB::raw('MAX(payment_date) as payment_date'),
            \DB::raw('SUM(amount_received) as total_amount_received'),
            \DB::raw('SUM(remaining_balance) as total_remaining_balance')
        )
        ->groupBy('client_email')
        ->get();

        return view('admin.history.history', compact('clients'));
    }



    public function storeClientHistory($clientId)
    {
        // Fetch the client data
        $client = Client::findOrFail($clientId);

        // Prepare data for history
        $historyData = [
            'client_id' => $client->id,
            'client_name' => $client->client_name,
            'client_email' => $client->client_email,
            'primary_phoneNo' => $client->primary_phoneNo,
            'address' => $client->address,
            'country' => $client->country,
            'agent_name' => $client->agent->name ?? 'N/A',
            'flat_number' => $client->flat->flat_number ?? 'N/A',
            'flat_rent' => $client->flat->rent ?? 0,
            'amount_received' => $client->rents()->latest()->first()->amount_received ?? 0,
            'remaining_balance' => $client->rents()->latest()->first()->remaining_balance ?? 0,
            'payment_date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Store history in the database
        DB::table('history')->insert($historyData);
    }

    public function downloadCsv($id)
    {
        // Fetch the client's history records based on the email
        $clientHistory = History::where('client_email', $id)->get();

        // Fetch the client IDs from the history records
        $clientIds = $clientHistory->pluck('client_id');

        // Fetch the clients with their related agent and flat data
        $clients = Client::with('agent', 'flat')->whereIn('id', $clientIds)->get();

        // Fetch the rent records associated with the clients
        $rents = Rent::whereIn('client_id', $clientIds)->get();

        // Prepare the CSV data with the correct headers
        $csvData = [
            ['Sr. No', 'Name', 'Agent Name', 'Flat No', 'Flat Rented', 'Amount Received', 'Remaining Balance', 'Rent Payment Date'],
        ];

        // Populate the CSV data
        foreach ($clients as $key => $client) {
            // Get the rent records for the client
            $clientRents = $rents->where('client_id', $client->id);

            foreach ($clientRents as $rent) {
                $csvData[] = [
                    $key + 1,
                    $client->client_name,
                    $client->agent->name ?? 'N/A',
                    $client->flat->flat_number ?? 'N/A',
                    $client->flat->rent ?? 'N/A',
                    $rent->amount_received ?? 'N/A',
                    $rent->remaining_balance ?? 'N/A',
                    $rent->payment_date ? \Carbon\Carbon::parse($rent->payment_date)->format('Y-m-d') : 'N/A',
                ];
            }
        }

        // Define the filename
        $filename = $clientHistory->first()->client_name . '_tenant_data.csv';

        // Open a file in write mode
        $handle = fopen($filename, 'w+');

        // Write each row to the CSV file
        foreach ($csvData as $row) {
            fputcsv($handle, $row);
        }

        // Close the file
        fclose($handle);

        // Prepare headers for download
        $headers = [
            'Content-Type' => 'text/csv',
        ];

        // Return the CSV file as a download
        return Response::download($filename, $filename, $headers);
    }


    public function downloadPdf($id)
    {
        // Fetch the client's history records based on the email
        $clientHistory = History::where('client_email', $id)->get();

        // Fetch the client IDs from the history records
        $clientIds = $clientHistory->pluck('client_id');

        // Fetch the clients with their related agent and flat data
        $clients = Client::with('agent', 'flat')->whereIn('id', $clientIds)->get();

        // Fetch the rent records associated with the clients
        $rents = Rent::whereIn('client_id', $clientIds)->get();

        // Prepare the data for the PDF
        $pdfData = [
            'clients' => $clients,
            'rents' => $rents,
            'clientName' => $clients->first()->client_name ?? 'Unknown',
        ];

        // Load the view with the data
        $pdf = PDF::loadView('admin.history.history-pdf', $pdfData);

        // Define the filename
        $filename = $pdfData['clientName'] . '_tenant_data.pdf';

        // Return the PDF file as a download
        return $pdf->download($filename);
    }


    public function viewHistory($id)
{
    // Fetch the client's history records based on the email
    $clientHistory = History::where('client_email', $id)->get();

    // Fetch the client IDs
    $clientIds = $clientHistory->pluck('client_id');

    // Fetch the clients and their related data
    $clients = Client::with('agent', 'flat')->whereIn('id', $clientIds)->get();

    // Fetch the rent records associated with the client
    $rents = Rent::whereIn('client_id', $clientIds)->get();

    // Prepare the data for the view
    $viewData = [
        'clients' => $clients,
        'rents' => $rents,
        'clientName' => $clients->first()->client_name ?? 'Unknown',
    ];

    // Return the view with the data
    return view('admin.history.history-pdf', $viewData);
}

}
