@extends('layout.admin')

@section('title', 'Edit Flat')

@section('content')
    <div class="container w-75">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900">Edit Flat</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('admin.update_flat', $flat->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="property">Select Property</label>
                                    <select class="form-control" id="property" name="property" required>
                                        <option value="" disabled>Select Property...</option>
                                        @foreach ($properties as $property)
                                            <option value="{{ $property->id }}"
                                                {{ $flat->property_id == $property->id ? 'selected' : '' }}>
                                                {{ $property->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="flat_number" name="flat_number"
                                        placeholder="Enter Flat Number..." value="{{ $flat->flat_number }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="floor" name="floor"
                                        placeholder="Enter Floor..." value="{{ $flat->floor }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="number" class="form-control" id="rent" name="rent"
                                        placeholder="Enter Rent Amount..." value="{{ $flat->rent }}" required>
                                </div>
                                <div class="d-flex justify-content-center text-white">
                                    <button type="submit" class="btn btn-user btn-block w-50"
                                        style="background-color: #4ab242; font-size:18px; color:white; font-weight:bold;">Update
                                        Flat</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
