@extends('layout.admin')

@section('title', 'Unpaid Clients')

@section('content')
    <style>
        td {
            min-width: 100px;
        }

        .input-field {
            width: 100px;
        }
    </style>
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Unpaid Tenants</h1>
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
                                <th>Rent Amount with debt</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Amount Received</th>
                                <th>Remaining Amount</th>
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
                                    <td>{{ $client->primary_phoneNo }}</td>
                                    <td>{{ $client->secondary_phoneNo ?? 'N/A' }}</td>
                                    <td>{{ $client->agent->name ?? 'N/A' }}</td>
                                    <td>{{ $client->flat->flat_number ?? 'N/A' }}</td>
                                    <td>${{ $client->flat->rent ?? 'N/A' }}</td>
                                    <td>${{ $client->amountduethismonth }}</td>
                                    <td>{{ $client->start_date }}</td>
                                    <td>{{ $client->end_date }}</td>
                                    <td>
                                        <input type="number" class="form-control input-field amount-received"
                                            data-rent="{{ $client->flat->rent ?? 0 }}" placeholder="Enter amount">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-field remaining-amount" readonly>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-success pay-rent-btn"
                                            data-client-id="{{ $client->id }}"
                                            data-client-name="{{ $client->client_name }}">Pay Rent</a>
                                        <a href="{{ route('admin.viewNotReceivedInvoice', ['clientId' => $client->id]) }}"
                                            class="btn btn-danger mt-2">Rent Not Received Invoice</a>
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
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure the rent has been paid?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <form id="payRentForm" method="POST" action="{{ route('admin.pay_rent') }}">
                        @csrf
                        <input type="hidden" name="client_id" id="client_id">
                        <input type="hidden" name="amount_received" id="amount_received_input">
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
                    <!-- Updated button with correct classes -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-success">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle calculation of remaining amount when amount received changes
            document.querySelectorAll('.amount-received').forEach(function(input) {
                input.addEventListener('input', function() {
                    var amountReceived = parseFloat(this.value) || 0;
                    var rentAmount = parseFloat(this.getAttribute('data-rent')) || 0;

                    // Calculate remaining amount
                    var remainingAmount = rentAmount - amountReceived;
                    this.closest('tr').querySelector('.remaining-amount').value = remainingAmount
                        .toFixed(2);
                });
            });

            // Handle click event on "Pay Rent" button to show the modal
            document.querySelectorAll('.pay-rent-btn').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default link behavior

                    var clientId = this.getAttribute('data-client-id');
                    var amountReceived = this.closest('tr').querySelector('.amount-received').value;

                    // Populate the hidden input fields with the client ID and amount received
                    document.getElementById('client_id').value = clientId;
                    document.getElementById('amount_received_input').value = amountReceived;

                    // Show the Pay Rent modal
                    var payRentModal = new bootstrap.Modal(document.getElementById('payRentModal'));
                    payRentModal.show();
                });
            });

            // Show the success modal if session success message exists
            @if (session('success'))
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            @endif
        });
    </script>

@endsection
