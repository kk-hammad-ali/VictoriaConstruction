@extends('layout.admin')

@section('title', 'Add Client')

@section('content')
    <div class="container w-75">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900">Add New Client</h1>
                            </div>
                            <form class="user" method="POST" action="">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="agent">Select Agent</label>
                                    <select class="form-control" id="agent" name="agent" required>
                                        <option value="" disabled selected>Select Agent...</option>
                                        <!-- Sample agents, replace with dynamic data -->
                                        <option value="1">Agent 1</option>
                                        <option value="2">Agent 2</option>
                                        <option value="3">Agent 3</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="property">Select Property</label>
                                    <select class="form-control" id="property" name="property" required>
                                        <option value="" disabled selected>Select Property...</option>
                                        <!-- Sample properties, replace with dynamic data -->
                                        <option value="1">Property 1</option>
                                        <option value="2">Property 2</option>
                                        <option value="3">Property 3</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="flat">Select Flat</label>
                                    <select class="form-control" id="flat" name="flat" required>
                                        <option value="" disabled selected>Select Flat...</option>
                                        <!-- Sample flats, replace with dynamic data -->
                                        <option value="1">Flat 101</option>
                                        <option value="2">Flat 102</option>
                                        <option value="3">Flat 103</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="client_name" name="client_name"
                                        placeholder="Enter Client Name..." required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="client_id" name="client_id"
                                        placeholder="Enter Client ID..." required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address..." required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="country" name="country"
                                        placeholder="Enter Country..." required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control" id="picture" name="picture" required>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-user btn-block" style="width: 100px">
                                        Upload
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
