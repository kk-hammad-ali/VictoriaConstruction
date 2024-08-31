@extends('layout.agent')

@section('title', 'All Clients')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Tenants</h1>
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
                                {{-- <th>Identification Type</th> --}}
                                {{-- <th>Identification ID</th> --}}
                                <th>Email</th>
                                {{-- <th>Address</th>
                                <th>Country</th> --}}
                                <th>Agent Name</th>
                                <th>Flat Rented</th>
                                <th>Rent Amount</th>
                                {{-- <th>Start Date</th>
                                <th>End Date</th> --}}
                                <th>Action</th>
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
                                    {{-- <td>{{ $client->identification_type }}</td>
                                    <td>{{ $client->client_id }}</td> --}}
                                    <td>{{ $client->client_email }}</td>
                                    {{-- <td>{{ $client->address }}</td>
                                    <td>{{ $client->country }}</td> --}}
                                    <td>{{ $client->agent->name ?? 'N/A' }}</td>
                                    <td>{{ $client->flat->flat_number ?? 'N/A' }}</td>
                                    <td>₤{{ $client->flat->rent ?? 'N/A' }}</td>
                                    {{-- <td>{{ $client->start_date }}</td>
                                    <td>{{ $client->end_date }}</td> --}}
                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#clientInfoModal" data-client="{{ json_encode($client) }}">Show
                                            Info</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Client Info Modal -->
    <div class="modal fade" id="clientInfoModal" tabindex="-1" aria-labelledby="clientInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clientInfoModalLabel">Client Information</h5>

                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="status p-3">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><strong>Name:</strong></td>
                                            <td id="client-name"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong></td>
                                            <td id="client-email"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Agent Name:</strong></td>
                                            <td id="agent-name"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Flat Number:</strong></td>
                                            <td id="flat-number"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Rent Amount:</strong></td>
                                            <td id="rent-amount"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Amount Due This Month:</strong></td>
                                            <td id="amount-due"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Identification Type:</strong></td>
                                            <td id="identification-type"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Identification ID:</strong></td>
                                            <td id="identification-id"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Address:</strong></td>
                                            <td id="address"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Country:</strong></td>
                                            <td id="country"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Start Date:</strong></td>
                                            <td id="start-date"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>End Date:</strong></td>
                                            <td id="end-date"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to Handle Modals -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var clientInfoModal = document.getElementById('clientInfoModal');
            clientInfoModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var client = JSON.parse(button.getAttribute('data-client'));

                // Populate modal fields
                document.getElementById('client-name').textContent = client.client_name;
                document.getElementById('client-email').textContent = client.client_email;
                document.getElementById('agent-name').textContent = client.agent ? client.agent.name :
                    'N/A';
                document.getElementById('flat-number').textContent = client.flat ? client.flat.flat_number :
                    'N/A';
                document.getElementById('rent-amount').textContent = '₤' + (client.flat ? client.flat.rent :
                    'N/A');
                document.getElementById('amount-due').textContent = '₤' + client.amountduethismonth;
                document.getElementById('identification-type').textContent = client.identification_type ||
                    'N/A';
                document.getElementById('identification-id').textContent = client.client_id ?? 'N/A';
                document.getElementById('address').textContent = client.address ?? 'N/A';
                document.getElementById('country').textContent = client.country ?? 'N/A';
                document.getElementById('start-date').textContent = client.start_date ?? 'N/A';
                document.getElementById('end-date').textContent = client.end_date ?? 'N/A';
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
