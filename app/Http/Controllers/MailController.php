<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;

class MailController extends Controller
{
    public function sendEmail($clientId)
    {
        // Fetch client details from the database
        $client = Client::findOrFail($clientId);

        // Get current date
        $date = now()->format('Y-m-d');

        // Logo path
        $logo = public_path('img/logo.png');

        // Generate the PDF
        $pdf = Pdf::loadView('mails.payment_receieved_invoice', [
            'company' => 'Victoria Construction',
            'date' => $date,
            'logo' => $logo,
            'client' => $client
        ]);

        // Create the PDF file
        $pdfFile = $pdf->output();

        // Prepare the email
        Mail::send([], [], function ($message) use ($client, $pdfFile) {
            $message->to($client->client_email)
                ->subject('Your Invoice from Victoria Construction')
                ->attachData($pdfFile, 'invoice_' . $client->id . '.pdf', [
                    'mime' => 'application/pdf',
                ]);
        });

        return response()->json(['message' => 'Invoice sent successfully']);
    }

    public function generateInvoice($clientId)
    {
        // Fetch client details from the database
        $client = Client::findOrFail($clientId);

        // Get current date
        $date = now()->format('Y-m-d');

        // Logo path
        $logo = public_path('img/logo.png');

        // Generate the PDF
        $pdf = Pdf::loadView('mails.payment_receieved_invoice', [
            'company' => 'Victoria Construction',
            'date' => $date,
            'logo' => $logo,
            'client' => $client
        ]);

        // Download the PDF with a specified filename
        return $pdf->download('invoice_' . $client->id . '.pdf');
    }


    public function viewInvoice($clientId)
    {
        // Fetch client details from the database
        $client = Client::findOrFail($clientId);

        // Get current date
        $date = now()->format('Y-m-d');

        // Logo path
        $logo = public_path('img/logo.png');

        // Generate the PDF
        $pdf = Pdf::loadView('mails.payment_receieved_invoice', [
            'company' => 'Victoria Construction',
            'date' => $date,
            'logo' => $logo,
            'client' => $client
        ]);

        // Return the PDF as a response to display in the browser
        return $pdf->stream('invoice_' . $client->id . '.pdf');
    }
}
