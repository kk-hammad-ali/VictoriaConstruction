@extends('layout.admin')

@section('title', 'All Tenant')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <style>
            td {
                min-width: 100px;
            }
        </style>
        <h1 class="h3 mb-2 text-gray-800">All Tenant</h1>
        <!-- DataTables Example -->
        <div class="card mb-5 mt-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Client Status</th>
                                <th>Name</th>
                                <th>Picture</th>
                                <th>License Picture</th>
                                {{-- <th>Identification Type</th>
                                <th>Identification ID</th>  --}}
                                <th>Email</th>
                                <th>Primary Phone Number</th>
                                {{-- <th>Secondary Phone Number</th>
                                <th>Address</th>
                                <th>Country</th> --}}
                                <th>Agent Name</th>
                                <th>Flat Rented</th>
                                <th>Rent Amount</th>
                                {{-- <th>Rent Amount with debt</th> --}}
                                {{-- <th>Start Date</th>
                                <th>End Date</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $key => $client)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ $client->client_status == 1 ? 'Living' : 'Old' }} <!-- Display Status -->
                                    </td>
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
                                    <td>{{ $client->primary_phoneNo }}</td>
                                    {{-- <td>{{ $client->secondary_phoneNo ?? 'N/A' }}</td> --}}
                                    {{-- <td>{{ $client->address }}</td>
                                    <td>{{ $client->country }}</td> --}}
                                    <td>{{ $client->agent->name ?? 'N/A' }}</td>
                                    <td>{{ $client->flat->flat_number ?? 'N/A' }}</td>
                                    <td>₤{{ $client->flat->rent ?? 'N/A' }}</td>
                                    {{-- <td>₤{{ $client->amountduethismonth }}</td> --}}
                                    {{-- <td>{{ $client->start_date }}</td>
                                    <td>{{ $client->end_date }}</td> --}}
                                    <td style="min-width: 180px">
                                        <a href="{{ route('admin.edit_client', $client->id) }}"
                                            class="me-3 btn btn-warning">Edit</a>
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#DeleteModal" data-client-id="{{ $client->id }}">Delete</a>
                                        @if ($client->client_status == 1)
                                            <a href="{{ route('admin.release_client', $client->id) }}"
                                                class="btn btn-success mt-2">Release</a>
                                        @endif
                                        <button type="button" class="btn btn-info mt-2" data-bs-toggle="modal"
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

    <!-- Delete Client Modal -->
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="deleteClientModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteClientModalLabel">Confirm Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this client?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="successModalLabel">Success</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-success">
                    Client deleted successfully.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Client Info Modal -->
    <!-- Client Info Modal -->
    <div class="modal fade" id="clientInfoModal" tabindex="-1" aria-labelledby="clientInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clientInfoModalLabel">Client Information</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="status p-3">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td><strong>Sr. No:</strong></td>
                                            <td id="client-sr-no"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Client Status:</strong></td>
                                            <td id="client-status"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Name:</strong></td>
                                            <td id="client-name"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong></td>
                                            <td id="client-email"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Primary Phone Number:</strong></td>
                                            <td id="primary-phoneNo"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Secondary Phone Number:</strong></td>
                                            <td id="secondary-phoneNo"></td>
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
                                            <td><strong>Agent Name:</strong></td>
                                            <td id="agent-name"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Flat Rented:</strong></td>
                                            <td id="flat-number"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Rent Amount:</strong></td>
                                            <td id="rent-amount"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Rent Amount with Debt:</strong></td>
                                            <td id="amount-due"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Start Date:</strong></td>
                                            <td id="start-date"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>End Date:</strong></td>
                                            <td id="end-date"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Identification Type:</strong></td>
                                            <td id="identification-type"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Identification ID:</strong></td>
                                            <td id="client-id"></td>
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



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set client ID in the delete form when clicking "Delete"
            var deleteModal = document.getElementById('DeleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var clientId = button.getAttribute('data-client-id');
                var form = deleteModal.querySelector('#deleteForm');
                form.setAttribute('action', '/admin/clients/' + clientId);
            });

            // Show success modal if session success is present
            @if (session('success_clients_delete'))
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            @endif
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var clientInfoModal = document.getElementById('clientInfoModal');
            clientInfoModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var client = JSON.parse(button.getAttribute('data-client'));

                // Populate modal fields
                document.getElementById('client-sr-no').textContent = client.sr_no || 'N/A';
                document.getElementById('client-status').textContent = client.status || 'N/A';
                document.getElementById('client-name').textContent = client.client_name || 'N/A';
                document.getElementById('client-email').textContent = client.client_email || 'N/A';
                document.getElementById('primary-phoneNo').textContent = client.primary_phoneNo || 'N/A';
                document.getElementById('secondary-phoneNo').textContent = client.secondary_phoneNo ||
                    'N/A';
                document.getElementById('address').textContent = client.address || 'N/A';
                document.getElementById('country').textContent = client.country || 'N/A';
                document.getElementById('agent-name').textContent = client.agent ? client.agent.name :
                    'N/A';
                document.getElementById('flat-number').textContent = client.flat ? client.flat.flat_number :
                    'N/A';
                document.getElementById('rent-amount').textContent = '₤' + (client.flat ? client.flat.rent :
                    'N/A');
                document.getElementById('amount-due').textContent = '₤' + client.amountduethismonth;
                document.getElementById('start-date').textContent = client.start_date || 'N/A';
                document.getElementById('end-date').textContent = client.end_date || 'N/A';
                document.getElementById('identification-type').textContent = client.identification_type ||
                    'N/A';
                document.getElementById('client-id').textContent = client.client_id || 'N/A';
            });
        });
    </script>

    <!-- JavaScript to Handle Modals -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
