@extends('layout.agent')

@section('title', 'Edit Client')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card border-0 shadow-lg my-5">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900">Edit Client</h1>
                        </div>
                        <form class="user" method="POST" enctype="multipart/form-data"
                            action="{{ route('client.update', $client->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Same fields as in the Add form -->
                            <div class="form-group mb-3">
                                <label for="agent">Agent Name</label>
                                <input type="text" class="form-control" id="agent" name="agent"
                                    value="{{ $client->agent->name }}" readonly>
                            </div>

                            <div class="form-group mb-3">
                                <label for="property_selected">Select Property</label>
                                <select class="form-control @error('property') is-invalid @enderror" id="property_selected"
                                    name="property" required>
                                    <option value="" disabled>Select Property...</option>
                                    @foreach ($properties as $id => $name)
                                        <option value="{{ $id }}" {{ $client->property_id == $id ? 'selected' : '' }}>
                                            {{ $name }}</option>
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
                                    @foreach ($flats as $id => $number)
                                        <option value="{{ $id }}" {{ $client->flat_id == $id ? 'selected' : '' }}>
                                            {{ $number }}</option>
                                    @endforeach
                                </select>
                                @error('flat')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Other form fields here -->
                            <div class="form-group mb-3">
                                <label for="client_name">Client Name</label>
                                <input type="text" class="form-control @error('client_name') is-invalid @enderror"
                                    id="client_name" name="client_name" placeholder="Enter Client Name..."
                                    value="{{ old('client_name', $client->client_name) }}" required>
                                @error('client_name')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- ... other fields, similar to the add form ... -->

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Save Changes
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
            var propertyId = "{{ $client->property_id }}";
            fetch('/agent/get-flats/' + propertyId)
                .then(response => response.json())
                .then(data => {
                    var flatSelect = document.getElementById('flat_selected');
                    flatSelect.innerHTML =
                        '<option value="" disabled>Select Flat...</option>';
                    for (var id in data) {
                        flatSelect.innerHTML += `<option value="${id}" ${id == "{{ $client->flat_id }}" ? 'selected' : ''}>${data[id]}</option>`;
                    }
                });

            document.getElementById('property_selected').addEventListener('change', function() {
                var propertyId = this.value;
                fetch('/agent/get-flats/' + propertyId)
                    .then(response => response.json())
                    .then(data => {
                        var flatSelect = document.getElementById('flat_selected');
                        flatSelect.innerHTML =
                            '<option value="" disabled>Select Flat...</option>';
                        for (var id in data) {
                            flatSelect.innerHTML += `<option value="${id}">${data[id]}</option>`;
                        }
                    });
            });
        });
    </script>

@endsection
