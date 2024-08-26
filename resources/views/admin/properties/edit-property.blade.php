@extends('layout.admin')

@section('title', 'Edit Property')

@section('content')
    <div class="container w-75">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900">Edit Property</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('admin.update_property', $property->id) }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Property Name..." value="{{ $property->name }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address..." value="{{ $property->address }}" required>
                                </div>
                                <div class="d-flex justify-content-center text-white">
                                    <button type="submit" class="btn btn-user btn-block w-50"
                                        style="background-color: #4ab242; font-size:18px; color:white; font-weight:bold;">Update
                                        Property</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
