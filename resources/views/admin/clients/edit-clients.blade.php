@extends('layout.admin')

@section('title', 'Edit Client')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card border-0 shadow-lg my-5">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900">Edit Tenant</h1>
                        </div>
                        <form class="user" method="POST" enctype="multipart/form-data"
                            action="{{ route('admin.update_client', $client->id) }}">
                            @csrf
                            {{-- @method('PUT') --}}

                            <div class="form-group mb-3">
                                <label for="agent">Select Agent</label>
                                <select class="form-control @error('agent') is-invalid @enderror" id="agent"
                                    name="agent" required>
                                    <option value="" disabled>Select Agent...</option>
                                    @foreach ($agents as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ $client->agent_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('agent')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="property_selected">Select Property</label>
                                <select class="form-control @error('property') is-invalid @enderror" id="property_selected"
                                    name="property" required>
                                    <option value="" disabled>Select Property...</option>
                                    @foreach ($properties as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ $client->property_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('property')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="flat_selected">Select Flat</label>
                                <select class="form-control @error('flat') is-invalid @enderror" id="flat_selected"
                                    name="flat" required>
                                    <option value="" disabled>Select Flat...</option>
                                    @foreach ($flats as $id => $name)
                                        <option value="{{ $id }}"
                                            {{ $client->flat_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('flat')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-group mb-3">
                                <label for="client_name">Client Name</label>
                                <input type="text" class="form-control @error('client_name') is-invalid @enderror"
                                    id="client_name" name="client_name" placeholder="Enter Client Name..."
                                    value="{{ old('client_name', $client->client_name) }}" required>
                                @error('client_name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="identification_type">Select Identification Type</label>
                                <select class="form-control @error('identification_type') is-invalid @enderror"
                                    id="identification_type" name="identification_type" required>
                                    <option value="" disabled>Select Identification Type...</option>
                                    <option value="Driver License"
                                        {{ $client->identification_type == 'Driver License' ? 'selected' : '' }}>Driver
                                        License</option>
                                    <option value="Passport Number"
                                        {{ $client->identification_type == 'Passport Number' ? 'selected' : '' }}>Passport
                                        Number</option>
                                </select>
                                @error('identification_type')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="license_picture">License Picture</label>
                                <input type="file" class="form-control @error('license_picture') is-invalid @enderror"
                                    id="license_picture" name="license_picture" value="{{ $client->license_picture }}">
                                <small id="pictureHelp" class="form-text text-muted">Choose a picture to upload.</small>
                                @error('license_picture')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                                {{-- @if ($client->license_picture)
                                    <img src="{{ asset( $client->license_picture) }}" alt="License Picture" class="img-fluid mt-2">
                                @endif --}}
                            </div>

                            <div class="form-group mb-3">
                                <label for="client_id">Client ID</label>
                                <input type="text" class="form-control @error('client_id') is-invalid @enderror"
                                    id="client_id" name="client_id" placeholder="Enter Client ID..."
                                    value="{{ old('client_id', $client->client_id) }}" required>
                                @error('client_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="client_email">Client Email</label>
                                <input type="text" class="form-control @error('client_email') is-invalid @enderror"
                                    id="client_email" name="client_email" placeholder="Enter Client Email..."
                                    value="{{ old('client_email', $client->client_email) }}" required>
                                @error('client_email')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Existing fields for start_date and end_date -->
                            <div class="form-group mb-3">
                                <label for="start_date">Start Date of Rent</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    id="start_date" name="start_date" value="{{ old('start_date', $client->start_date) }}"
                                    required>
                                @error('start_date')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="end_date">End Date of Rent</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                    id="end_date" name="end_date" value="{{ old('end_date', $client->end_date) }}"
                                    required>
                                @error('end_date')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="primary_phoneNo">Primary Phone Number</label>
                                <input type="text" class="form-control @error('primary_phoneNo') is-invalid @enderror"
                                    id="primary_phoneNo" name="primary_phoneNo"
                                    placeholder="Enter Primary Phone Number..."
                                    value="{{ old('primary_phoneNo', $client->primary_phoneNo) }}" required>
                                @error('primary_phoneNo')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="secondary_phoneNo">Secondary Phone Number (Optional)</label>
                                <input type="text"
                                    class="form-control @error('secondary_phoneNo') is-invalid @enderror"
                                    id="secondary_phoneNo" name="secondary_phoneNo"
                                    placeholder="Enter Secondary Phone Number..."
                                    value="{{ old('secondary_phoneNo', $client->secondary_phoneNo) }}">
                                @error('secondary_phoneNo')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    id="address" name="address" placeholder="Enter Address..."
                                    value="{{ old('address', $client->address) }}" required>
                                @error('address')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="country">Country</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                    id="country" name="country" placeholder="Enter Country..."
                                    value="{{ old('country', $client->country) }}" required>
                                @error('country')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="picture">Profile Picture</label>
                                <input type="file" class="form-control @error('picture') is-invalid @enderror"
                                    id="picture" name="picture">
                                @error('picture')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                                {{-- @if ($client->picture)
                                    <img src="{{ asset('storage/' . $client->picture) }}" alt="Profile Picture" class="img-fluid mt-2">
                                @endif --}}
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
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
                    Succesfully Edited Client
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Populate properties based on the selected agent
            document.getElementById('agent').addEventListener('change', function() {
                var agentId = this.value;
                fetch('/admin/get-properties/' + agentId)
                    .then(response => response.json())
                    .then(data => {
                        var propertySelect = document.getElementById('property_selected');
                        propertySelect.innerHTML =
                            '<option value="" disabled>Select Property...</option>';

                        for (var id in data) {
                            propertySelect.innerHTML += `<option value="${id}">${data[id]}</option>`;
                        }

                        // Set selected property value if available
                        propertySelect.value = '{{ $client->property_id }}';
                        document.getElementById('property_selected').dispatchEvent(new Event('change'));
                    });
            });

            // Populate flats based on the selected property
            document.getElementById('property_selected').addEventListener('change', function() {
                var propertyId = this.value;
                fetch('/admin/get-flats/' + propertyId)
                    .then(response => response.json())
                    .then(data => {
                        var flatSelect = document.getElementById('flat_selected');
                        flatSelect.innerHTML =
                            '<option value="" disabled>Select Flat...</option>';

                        for (var id in data) {
                            flatSelect.innerHTML += `<option value="${id}">${data[id]}</option>`;
                        }

                        // Set selected flat value if available
                        flatSelect.value = '{{ $client->flat_id }}';
                    });
            });

            // Initialize form with existing values
            var initialPropertyId = '{{ $client->property_id }}';
            if (initialPropertyId) {
                document.getElementById('property_selected').dispatchEvent(new Event('change'));
            }

            @if (session('success_clients_edit'))
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            @endif
        });

        // Show success modal if session success is present
    </script>



    <!-- JavaScript to Handle Modals -->
@endsection
