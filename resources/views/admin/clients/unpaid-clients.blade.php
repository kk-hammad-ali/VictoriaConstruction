@extends('layout.admin')

@section('title', 'Unpaid Clients')

@section('content')
    <style>
        td {
            min-width: 100px;
        }
    </style>
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Unpaid Clients</h1>
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
                                    <td>{{ $client->identification_type }}</td>
                                    <td>{{ $client->client_id }}</td>
                                    <td>{{ $client->client_email }}</td>
                                    <td>{{ $client->address }}</td>
                                    <td>{{ $client->country }}</td>
                                    <td>{{ $client->primary_phoneNo }}</td> <!-- Display Primary Phone Number -->
                                    <td>{{ $client->secondary_phoneNo ?? 'N/A' }}</td>
                                    <!-- Display Secondary Phone Number, or 'N/A' if null -->
                                    <td>{{ $client->agent->name ?? 'N/A' }}</td>
                                    <td>{{ $client->flat->flat_number ?? 'N/A' }}</td>
                                    <td>${{ $client->flat->rent ?? 'N/A' }}</td>
                                    <td>{{ $client->start_date }}</td>
                                    <td>{{ $client->end_date }}</td>
                                    <td>
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#payRentModal" data-client-id="{{ $client->id }}">Pay
                                            Rent</a>
                                        <a href="{{ route('admin.sendNotReceivedInvoice', ['clientId' => $client->id]) }}"
                                            class="btn btn-danger mt-2">
                                            Send Not Received Invoice
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pay Rent Modal -->
    <div class="modal fade" id="payRentModal" tabindex="-1" aria-labelledby="payRentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="payRentModalLabel">Confirm Payment</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure the rent has been paid?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <form id="payRentForm" method="POST" action="{{ route('admin.pay_rent') }}">
                        @csrf
                        <input type="hidden" name="client_id" id="client_id">
                        <button type="submit" class="btn btn-primary">Yes, Pay Rent</button>
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
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to Handle Modals -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set client ID in the modal form when clicking "Pay Rent"
            var payRentModal = document.getElementById('payRentModal');
            payRentModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var clientId = button.getAttribute('data-client-id');
                var form = payRentModal.querySelector('#payRentForm');
                form.querySelector('#client_id').value = clientId;
            });

            // Show success modal if session success is present
            @if (session('success'))
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            @endif
        });
    </script>
@endsection
