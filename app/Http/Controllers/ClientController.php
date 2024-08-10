<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use App\Models\User;
use App\Models\Property;
use App\Models\Flat;
use App\Models\Client;
use PDF; // Import the PDF facade


class ClientController extends Controller
{
    public function adminUnpaidClient()
    {
        // Fetch clients with status 0
        $clients = Client::where('status', 0)
                         ->with(['agent', 'flat'])
                         ->get();

        return view('admin.clients.unpaid-clients', compact('clients'));
    }

    public function adminPaidClient()
    {
        // Fetch clients with status 0
        $clients = Client::where('status', 1)
                         ->with(['agent', 'flat'])
                         ->get();

        return view('admin.clients.paid-clients', compact('clients'));
    }


    public function agentUnpaidClient()
    {
        $agentId = auth()->id();

        // Fetch clients with status 0 and the authenticated agent ID
        $clients = Client::where('status', 0)
                         ->where('agent_id', $agentId)
                         ->with(['agent', 'flat'])
                         ->get();

        return view('agent.client.unpaid-clients', compact('clients'));
    }


    public function agentPaidClient()
    {
        $agentId = auth()->id();


        $clients = Client::where('status', 1)
                         ->where('agent_id', $agentId)
                         ->with(['agent', 'flat'])
                         ->get();

        return view('agent.client.paid-clients', compact('clients'));
    }


    public function adminAddClient()
    {
        $agents = User::where('role', 1)->pluck('name', 'id');
        return view('admin.clients.add-clients', compact('agents'));
    }


    public function getProperties($agentId)
    {
        $properties = Property::where('user_id', $agentId)->pluck('name', 'id');
        return response()->json($properties);
    }

    public function getFlats($propertyId)
    {
        $flats = Flat::where('property_id', $propertyId)->pluck('flat_number', 'id');
        return response()->json($flats);
    }

    public function editAdminClient($id)
    {
        // $client = Clients::findOrFail($id);
        // compact('client')
        return view('admin.clients.edit-clients');
    }



    public function agentAllClient()
    {
        // Fetch all clients
        $clients = Client::all();

        // Pass the clients to the view
        return view('agent.client.all-client', compact('clients'));
    }
    public function adminAllClient()
    {
        // Fetch all clients
        $clients = Client::all();

        // Pass the clients to the view
        return view('admin.clients.all-clients', compact('clients'));
    }



    public function agentAddClient()
    {
        $agentId = auth()->user()->id;
        $agent = auth()->user()->name;
        $properties = Property::where('user_id', $agentId)->pluck('name', 'id');
        $flats = Flat::whereIn('property_id', $properties->keys())->pluck('flat_number', 'id');


        return view('agent.client.add-client', compact('agent','agentId', 'properties', 'flats'));
    }



    public function storeClient(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'agent' => 'required|exists:users,id',
            'property' => 'required|exists:properties,id',
            'flat' => 'required|exists:flats,id',
            'identification_type' => 'required|string|max:255',
            'license_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8192',
            'client_name' => 'required|string|max:255',
            'client_id' => 'required|string|max:255|unique:clients,client_id',
            'client_email' => 'required|string|email|max:255|unique:clients,client_email',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8192',
            'start_date' => 'required|date',  // Validate start date
            'end_date' => 'required|date|after_or_equal:start_date',
            'primary_phoneNo' => 'required|string|max:15',
            'secondary_phoneNo' => 'nullable|string|max:15',
        ]);

        // Handle picture upload
        $picturePath = null;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/clients/'), $filename);
            $picturePath = 'images/clients/' . $filename;
        }

        // Handle license picture upload
        $licensePicturePath = null;
        if ($request->hasFile('license_picture')) {
            $file = $request->file('license_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/license/'), $filename);
            $licensePicturePath = 'images/license/' . $filename;
        }

        // Create a new Client instance
        $client = new Client();
        $client->client_name = $request->input('client_name');
        $client->client_id = $request->input('client_id');
        $client->client_email = $request->input('client_email');
        $client->identification_type = $request->input('identification_type');
        $client->address = $request->input('address');
        $client->country = $request->input('country');
        $client->agent_id = $request->input('agent'); // Foreign key for agent
        $client->property_id = $request->input('property'); // Foreign key for property
        $client->flat_id = $request->input('flat'); // Foreign key for flat
        $client->picture = $picturePath; // Store picture path
        $client->license_picture = $licensePicturePath; // Store license picture path
        $client->start_date = $request->input('start_date'); // Store start date
        $client->end_date = $request->input('end_date');
        $client->primary_phoneNo = $request->input('primary_phoneNo');
        $client->secondary_phoneNo = $request->input('secondary_phoneNo', null);
        $client->status = 0; // Default status value

        // Save the client
        $client->save();

        // Redirect with success message
        return redirect()->route('admin.unpaid_client')->with('success_clients', 'Client added successfully.');
    }



    public function agentStoreClient(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'property' => 'required|exists:properties,id',
            'flat' => 'required|exists:flats,id',
            'identification_type' => 'required|string|max:255',
            'license_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8192',
            'client_name' => 'required|string|max:255',
            'client_id' => 'required|string|max:255|unique:clients,client_id',
            'client_email'=> 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8192',
            'start_date' => 'required|date',  // Validate start date
            'end_date' => 'required|date|after_or_equal:start_date',
            'primary_phoneNo' => 'required|string|max:15',
            'secondary_phoneNo' => 'nullable|string|max:15', // Validate end date
        ]);

        // Handle file upload
        $picturePath = null;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/clients/'), $filename);
            $picturePath = 'images/clients/' . $filename;
        }

        $agentId = auth()->user()->id;

        // Create a new Client instance
        $client = new Client();

        $client->client_name = $request->input('client_name');
        $client->client_id = $request->input('client_id');
        $client->client_email = $request->input('client_email');
        $client->identification_type = $request->identification_type;
        $client->address = $request->input('address');
        $client->country = $request->input('country');
        $client->agent_id = $agentId;// Foreign key for agent
        $client->property_id = $request->input('property'); // Foreign key for property
        $client->flat_id = $request->input('flat'); // Foreign key for flat
        $client->picture = $picturePath; // Store picture path
        $client->status = 0; // Default status value
        $client->start_date = $request->input('start_date'); // Store start date
        $client->end_date = $request->input('end_date');
        $client->primary_phoneNo = $request->input('primary_phoneNo');
        $client->secondary_phoneNo = $request->input('secondary_phoneNo', null);

        if ($request->hasFile('license_picture')) {
            $file = $request->file('license_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/license/'), $filename);
            $client->license_picture = 'images/license/' . $filename;
        }

        // Save the client
        $client->save();

        // Redirect with success message
        return redirect()->route('agent.unpaid_client')->with('success_clients', 'Client added successfully.');
    }

    public function payRent(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
        ]);

        $client_id = $request->input('client_id');
        $client = Client::find($client_id);
        if ($client) {
            $client->status = 1;
            $client->payment_date = now();
            $client->save();
            // Redirect back with success message
            return redirect()->route('admin.unpaid_client')->with('success', 'Bills are paid.');
        }
        return redirect()->route('admin.unpaid_client')->with('error', 'Client not found.');
    }


    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $agents = User::pluck('name', 'id'); // Adjust based on your Agent model
        $properties = Property::pluck('name', 'id'); // Adjust based on your Property model
        $flats = Flat::pluck('flat_number', 'id'); // Adjust based on your Flat model

        return view('admin.clients.edit-clients', compact('client', 'agents', 'properties', 'flats'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'agent' => 'required|exists:users,id',
            'property' => 'required|exists:properties,id',
            'flat' => 'required|exists:flats,id',
            'client_name' => 'required|string|max:255',
            'identification_type' => 'required|string|in:Driver License,Passport Number',
            'license_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'client_id' => 'required|string|max:255',
            'client_email' => 'required|email|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'primary_phoneNo' => 'required|string|max:15',
            'secondary_phoneNo' => 'nullable|string|max:15',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $client = Client::findOrFail($id);


        if ($request->hasFile('license_picture')) {
            $file = $request->file('license_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/license/'), $filename);
            $client->license_picture = 'images/license/' . $filename;
        }


        $picturePath = null;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/clients/'), $filename);
            $picturePath = 'images/clients/' . $filename;
            $client->picture = $picturePath;
        }

        // Update client data
        $client->update([
            'agent_id' => $request->input('agent'),
            'property_id' => $request->input('property'),
            'flat_id' => $request->input('flat'),
            'client_name' => $request->input('client_name'),
            'identification_type' => $request->input('identification_type'),
            'client_id' => $request->input('client_id'),
            'client_email' => $request->input('client_email'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'primary_phoneNo' => $request->input('primary_phoneNo'),
            'secondary_phoneNo' => $request->input('secondary_phoneNo'),
            'address' => $request->input('address'),
            'country' => $request->input('country'),
        ]);

        return redirect()->route('admin.edit_client', $client->id)->with('success_clients_edit', 'Client updated successfully');
    }


    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        // Delete associated images
        if ($client->picture) {
            $picturePath = public_path($client->picture);
            if (file_exists($picturePath)) {
                unlink($picturePath);
            }
        }

        if ($client->license_picture) {
            $licensePicturePath = public_path($client->license_picture);
            if (file_exists($licensePicturePath)) {
                unlink($licensePicturePath);
            }
        }

        // Delete the client
        $client->delete();

        return redirect()->route('admin.all_client')->with('success_clients_delete', 'Client deleted successfully');
    }
}
