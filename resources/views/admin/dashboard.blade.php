@extends('layout.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Total Earnings Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Earnings</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">₤{{ number_format($totalEarnings, 2) }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Clients Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Tenants</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalClients }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Properties Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Properties</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProperties }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-building fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Agents Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Agents</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAgents }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <style>
            td {
                min-width: 100px;
            }

            /* Style for the search input */
            .search-container {
                margin-bottom: 20px;
            }

            .search-container input {
                width: 100%;
                padding: 10px;
                box-sizing: border-box;
                border: none;
            }
        </style>
        <h1 class="h3 mb-2 text-gray-800 mt-5">Recent Paid</h1>

        <!-- DataTables Example -->
        <div class="card mb-5 mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Primary Phone Number</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>Agent Name</th>
                                <th>Flat No</th>
                                <th>Flat Rented</th>
                                <th>Rent Payment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $key => $client)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $client->client_name }}</td>
                                    <td>{{ $client->client_email }}</td>
                                    <td>{{ $client->primary_phoneNo }}</td>
                                    <td>{{ $client->address }}</td>
                                    <td>{{ $client->country }}</td>
                                    <td>{{ $client->agent_name ?? 'N/A' }}</td>
                                    <td>{{ $client->flat_number ?? 'N/A' }}</td>
                                    <td>${{ $client->flat_rent ?? 'N/A' }}</td>
                                    <td>{{ $client->payment_date ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
