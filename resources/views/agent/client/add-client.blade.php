@extends('layout.agent')

@section('title', 'Add Client')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card border-0 shadow-lg my-5">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900">Add New Client</h1>
                        </div>
                        <form class="user" method="POST" enctype="multipart/form-data"
                            action="{{ route('agent.store_client') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="agent">Agent Name</label>
                                <input type="text" class="form-control" id="agent" name="agent"
                                    value="{{ $agent }}" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="property_selected">Select Property</label>
                                <select class="form-control @error('property') is-invalid @enderror" id="property_selected"
                                    name="property" required>
                                    <option value="" disabled selected>Select Property...</option>
                                    @foreach ($properties as $id => $name)
                                        <option value="{{ $id }}" {{ old('property') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
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
                                    <option value="" disabled selected>Select Flat...</option>
                                    @if (old('property'))
                                        @foreach ($flats as $id => $name)
                                            <option value="{{ $id }}" {{ old('flat') == $id ? 'selected' : '' }}>
                                                {{ $name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('flat')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="client_name">Client Name</label>
                                <input type="text" class="form-control @error('client_name') is-invalid @enderror"
                                    id="client_name" name="client_name" placeholder="Enter Client Name..."
                                    value="{{ old('client_name') }}" required>
                                @error('client_name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="identification_type">Select Identification Type</label>
                                <select class="form-control" id="identification_type" name="identification_type" required>
                                    <option value="" disabled selected>Select Identification Type...</option>
                                    <option value="Driver License"
                                        {{ old('identification_type') == 'Driver License' ? 'selected' : '' }}>
                                        Driver License
                                    </option>
                                    <option value="Passport Number"
                                        {{ old('identification_type') == 'Passport Number' ? 'selected' : '' }}>
                                        Passport Number
                                    </option>
                                </select>
                                @error('identification_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="license_picture">License Picture</label>
                                <input type="file" class="form-control @error('license_picture') is-invalid @enderror"
                                    id="license_picture" name="license_picture" aria-describedby="pictureHelp">
                                <small id="pictureHelp" class="form-text text-muted">Choose a picture to upload.</small>
                                @error('license_picture')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="client_id">Client ID</label>
                                <input type="text" class="form-control @error('client_id') is-invalid @enderror"
                                    id="client_id" name="client_id" placeholder="Enter Client ID..."
                                    value="{{ old('client_id') }}" required>
                                @error('client_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="client_email">Client Email</label>
                                <input type="text" class="form-control @error('client_email') is-invalid @enderror"
                                    id="client_email" name="client_email" placeholder="Enter Client Email..."
                                    value="{{ old('client_email') }}" required>
                                @error('client_email')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="start_date">Start Date of Rent</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                    id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                                @error('start_date')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="end_date">End Date of Rent</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                    id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                                @error('end_date')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    id="address" name="address" placeholder="Enter Address..."
                                    value="{{ old('address') }}" required>
                                @error('address')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="country">Country</label>
                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                    id="country" name="country" placeholder="Enter Country..."
                                    value="{{ old('country') }}" required>
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
                            </div>

                            <div class="form-group mb-3">
                                <label for="primary_phoneNo">Primary Phone Number</label>
                                <input type="text" class="form-control @error('primary_phoneNo') is-invalid @enderror"
                                    id="primary_phoneNo" name="primary_phoneNo"
                                    placeholder="Enter Primary Phone Number..." value="{{ old('primary_phoneNo') }}"
                                    required>
                                @error('primary_phoneNo')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="secondary_phoneNo">Secondary Phone Number (Optional)</label>
                                <input type="text"
                                    class="form-control @error('secondary_phoneNo') is-invalid @enderror"
                                    id="secondary_phoneNo" name="secondary_phoneNo"
                                    placeholder="Enter Secondary Phone Number..." value="{{ old('secondary_phoneNo') }}">
                                @error('secondary_phoneNo')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Add New Client
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
            const agentId = "{{ $agentId }}";

            fetch(`/client/get-properties/${agentId}`)
                .then(response => response.json())
                .then(data => {
                    const propertySelect = document.getElementById('property_selected');
                    propertySelect.innerHTML = '<option value="" disabled selected>Select Property...</option>';

                    for (const id in data) {
                        propertySelect.innerHTML += `<option value="${id}">${data[id]}</option>`;
                    }
                });

            document.getElementById('property_selected').addEventListener('change', function() {
                const propertyId = this.value;

                fetch(`/agent/get-flats/${propertyId}`)
                    .then(response => response.json())
                    .then(data => {
                        const flatSelect = document.getElementById('flat_selected');
                        flatSelect.innerHTML =
                            '<option value="" disabled selected>Select Flat...</option>';

                        for (const id in data) {
                            flatSelect.innerHTML += `<option value="${id}">${data[id]}</option>`;
                        }
                    });
            });
        });
    </script>
@endsection
