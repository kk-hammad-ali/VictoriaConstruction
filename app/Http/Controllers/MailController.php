<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReceivedInvoiceEmail;
use App\Mail\NotReceivedInvoiceEmail;
use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;

class MailController extends Controller
{
    protected $logoPath;

    public function __construct()
    {
        $this->logoPath = public_path('img/logo.png');
    }


    // Send Received Invoice
    public function sendReceivedInvoice($clientId)
    {
        $client = Client::findOrFail($clientId);
        $date = now()->format('Y-m-d');
        $pdf = Pdf::loadView('mails.payment_received_invoice', [
            'date' => $date,
            'client' => $client,
            'logoUrl' => $this->logoPath,
        ]);
        $pdfFile = $pdf->output();
        $subject = 'Your Payment Received Invoice from Victoria Construction';

        Mail::send([], [], function ($message) use ($client, $pdfFile, $subject) {
            $message->to($client->client_email)
                ->subject($subject)
                ->attachData($pdfFile, 'rent_received_' . $client->client_name . '.pdf', [
                    'mime' => 'application/pdf',
                ]);
        });

        return redirect()->route('admin.unpaid_client')->with('success', 'Received invoice sent successfully');
    }

    // Generate Received Invoice
    public function generateReceivedInvoice($clientId)
    {
        $client = Client::findOrFail($clientId);
        $date = now()->format('Y-m-d');
        $pdf = Pdf::loadView('mails.payment_received_invoice', [
            'date' => $date,
            'client' => $client,
            'logoUrl' => $this->logoPath,
        ]);

        return $pdf->download('rent_received_' . $client->client_name . '.pdf');
    }

    // View Received Invoice
    public function viewReceivedInvoice($clientId)
    {
        $client = Client::with(['agent', 'property', 'flat'])->findOrFail($clientId);
        $date = now()->format('Y-m-d');

        return view('mails.payment_receieved_invoice', [
            'date' => $date,
            'client' => $client,
            'logoUrl' => $this->logoPath,
        ]);
    }

    // Send Not Received Invoice
    public function sendNotReceivedInvoice($clientId)
    {
        $client = Client::findOrFail($clientId);
        $date = now()->format('Y-m-d');
        $pdf = Pdf::loadView('mails.payment_not_received_invoice', [
            'date' => $date,
            'client' => $client,
            'logoUrl' => $this->logoPath,
        ]);
        $pdfFile = $pdf->output();
        $subject = 'Your Payment Not Received Invoice from Victoria Construction';

        Mail::send([], [], function ($message) use ($client, $pdfFile, $subject) {
            $message->to($client->client_email)
                ->subject($subject)
                ->attachData($pdfFile, 'rent_not_received_' . $client->client_name . '.pdf', [
                    'mime' => 'application/pdf',
                ]);
        });

        return redirect()->route('admin.unpaid_client')->with('success', 'Not Received invoice sent successfully');
    }

    // Generate Not Received Invoice
    public function generateNotReceivedInvoice($clientId)
    {
        $client = Client::findOrFail($clientId);
        $date = now()->format('Y-m-d');
        $pdf = Pdf::loadView('mails.payment_not_received_invoice', [
            'date' => $date,
            'client' => $client,
            'logoUrl' => $this->logoPath,
        ]);

        return $pdf->download('rent_not_received_' . $client->client_name . '.pdf');
    }

    // View Not Received Invoice
    public function viewNotReceivedInvoice($clientId)
    {
        $client = Client::with(['agent', 'property', 'flat'])->findOrFail($clientId);
        $date = now()->format('Y-m-d');

        return view('mails.payment_not_received_invoice', [
            'date' => $date,
            'client' => $client,
            'logoUrl' => $this->logoPath,
        ]);
    }
}
