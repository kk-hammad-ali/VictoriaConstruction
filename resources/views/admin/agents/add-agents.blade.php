@extends('layout.admin')

@section('title', 'Add Agent Information')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="container w-75">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900">Add New Agent</h1>
                            </div>
                            <form class="user" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.store_agent') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="identification_type">Select Identification Type</label>
                                    <select class="form-control" id="identification_type" name="identification_type"
                                        required>
                                        <option value="" disabled selected>Select Identification Type...</option>
                                        <option value="driver_license" {{ old('identification_type') == 'driver_license' ? 'selected' : '' }}>Driver License</option>
                                        <option value="passport_number" {{ old('identification_type') == 'passport_number' ? 'selected' : '' }}>Passport Number</option>
                                    </select>
                                    @error('identification_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="identification_number"
                                        name="identification_number"
                                        placeholder="Enter Driver License or Passport Number..." value="{{ old('identification_number') }}" required>
                                    @error('identification_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control" id="picture" name="picture"
                                        aria-describedby="pictureHelp">
                                    <small id="pictureHelp" class="form-text text-muted">Choose a picture to upload.</small>
                                    @error('picture')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Name..." value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Enter Email..." value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="Enter Phone..." value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address..." value="{{ old('address') }}" required>
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-center text-white">
                                    <button type="submit" class="btn btn-user btn-block w-50"
                                        style="background-color: #4ab242; font-size:18px; color:white; font-weight:bold;">Add
                                        Agent</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
