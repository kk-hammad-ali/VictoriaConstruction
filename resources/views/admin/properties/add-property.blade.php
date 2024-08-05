@extends('layout.admin')

@section('title', 'Add Property Information')

@section('content')
    <div class="container w-75">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900">Add New Property</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('admin.store_property') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Property Name..." required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="agent" name="agent"
                                        placeholder="Enter Agent Name..." required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address..." required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" style="width: 100px">
                                    Upload
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
