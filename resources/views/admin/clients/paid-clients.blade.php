@extends('layout.admin')

@section('title', 'All Clients')

@section('content')
    <style>
        td {
            min-width: 100px;
        }
    </style>
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Paid Tenant</h1>
        <!-- DataTables Example -->
        <div class="card mb-5 mt-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Name</th>
                                <th>Picture</th>
                                <th>License Picture</th>
                                <th>Identification Type</th>
                                <th>Identification ID</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>Primary Phone Number</th>
                                <th>Secondary Phone Number</th>
                                <th>Agent Name</th>
                                <th>Flat Rented</th>
                                <th>Rent Amount</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $key => $client)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $client->client_name }}</td>
                                    <td>
                                        @if ($client->picture)
                                            <img src="{{ asset($client->picture) }}" alt="{{ $client->client_name }}"
                                                width="50">
                                        @else
                                            <img src="{{ asset('images/default-profile.png') }}" alt="Default Picture"
                                                width="50">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($client->license_picture)
                                            <img src="{{ asset($client->license_picture) }}"
                                                alt="{{ $client->license_picture }}" width="50">
                                        @else
                                            <img src="{{ asset('images/default-profile.png') }}" alt="Default Picture"
                                                width="50">
                                        @endif
                                    </td>
                                    <td>{{ $client->identification_type }}</td>
                                    <td>{{ $client->client_id }}</td>
                                    <td>{{ $client->client_email }}</td>
                                    <td>{{ $client->address }}</td>
                                    <td>{{ $client->country }}</td>
                                    <td>{{ $client->primary_phoneNo }}</td> <!-- Display Primary Phone Number -->
                                    <td>{{ $client->secondary_phoneNo ?? 'N/A' }}</td>
                                    <td>{{ $client->agent->name ?? 'N/A' }}</td>
                                    <td>{{ $client->flat->flat_number ?? 'N/A' }}</td>
                                    <td>${{ $client->flat->rent ?? 'N/A' }}</td>
                                    <td>{{ $client->start_date }}</td> <!-- Display Start Date -->
                                    <td>{{ $client->end_date }}</td> <!-- Display End Date -->
                                    <td>
                                        {{-- <a href="#" class="btn btn-success disabled" data-bs-toggle="modal"
                                            data-bs-target="#payRentModal" data-client-id="{{ $client->id }}">Paid</a> --}}
                                        <a href="#" class="btn btn-success disabled" data-bs-toggle="modal">Paid</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
