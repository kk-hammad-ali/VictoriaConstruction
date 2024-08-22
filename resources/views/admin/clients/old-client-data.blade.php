@extends('layout.admin')

@section('title', 'Add Old Tenant Data')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-10 col-sm-12">
                <div class="card border-0 shadow-lg my-5">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900">Add Old Tenant Data</h1>
                        </div>
                        <form class="user" method="POST" enctype="multipart/form-data"
                            action="{{ route('admin.store_old_client_data') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="client_id">Client</label>
                                <select class="form-control @error('client_id') is-invalid @enderror" id="client_id"
                                    name="client_id" required>
                                    <option value="" disabled selected>Select a Client</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}"
                                            {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                            {{ $client->client_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('client_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Input to specify number of rent entries -->
                            <div class="form-group mb-3">
                                <label for="number_of_entries">Number of Rent Entries</label>
                                <input type="number" class="form-control @error('number_of_entries') is-invalid @enderror"
                                    id="number_of_entries" name="number_of_entries" min="1"
                                    value="{{ old('number_of_entries') }}" required>
                                @error('number_of_entries')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Container for dynamically generated rent fields -->
                            <div id="rent-fields-container"></div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Add Old Tenant Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const numberOfEntriesInput = document.getElementById('number_of_entries');
            const rentFieldsContainer = document.getElementById('rent-fields-container');

            numberOfEntriesInput.addEventListener('change', function() {
                const numberOfEntries = parseInt(this.value);

                // Clear previous fields
                rentFieldsContainer.innerHTML = '';

                // Generate new fields
                for (let i = 1; i <= numberOfEntries; i++) {
                    rentFieldsContainer.innerHTML += `
                <div class="row mb-4">
                    <div class="col-md-2">
                        <label for="rent_month_${i}" class="form-label">Month</label>
                        <input type="text" class="form-control"
                            id="rent_month_${i}" name="rent_month_${i}" placeholder="Month" required>
                    </div>
                    <div class="col-md-2">
                        <label for="rent_year_${i}" class="form-label">Year</label>
                        <input type="number" class="form-control"
                            id="rent_year_${i}" name="rent_year_${i}" placeholder="Year" required>
                    </div>
                    <div class="col-md-2">
                        <label for="rent_amount_due_${i}" class="form-label">Amount Due</label>
                        <input type="number" step="0.01" class="form-control"
                            id="rent_amount_due_${i}" name="rent_amount_due_${i}" placeholder="Amount Due" required>
                    </div>
                    <div class="col-md-2">
                        <label for="rent_amount_received_${i}" class="form-label">Amount Received</label>
                        <input type="number" step="0.01" class="form-control"
                            id="rent_amount_received_${i}" name="rent_amount_received_${i}" placeholder="Amount Received">
                    </div>
                    <div class="col-md-2">
                        <label for="rent_remaining_balance_${i}" class="form-label">Remaining Balance</label>
                        <input type="number" step="0.01" class="form-control"
                            id="rent_remaining_balance_${i}" name="rent_remaining_balance_${i}" placeholder="Remaining Balance">
                    </div>
                    <div class="col-md-2">
                        <label for="rent_payment_date_${i}" class="form-label">Payment Date</label>
                        <input type="date" class="form-control"
                            id="rent_payment_date_${i}" name="rent_payment_date_${i}">
                    </div>
                </div>
            `;
                }
            });
        });
    </script>

@endsection
