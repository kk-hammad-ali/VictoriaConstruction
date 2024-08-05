@extends('layout.agent')

@section('title', 'Add Client Information')

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
                            <form class="user" enctype="multipart/form-data" method="POST" action="">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="agent" name="agent" value="Jack"
                                        readonly>
                                </div>
                                <div class="form-group mb-3">
                                    <select class="form-control" id="property" name="property" required>
                                        <option value="" disabled selected>Select Property...</option>
                                        <!-- Sample properties, replace with dynamic data -->
                                        <option value="1">Property 1</option>
                                        <option value="2">Property 2</option>
                                        <option value="3">Property 3</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <select class="form-control" id="flat" name="flat" required>
                                        <option value="" disabled selected>Select Flat...</option>
                                        <!-- Sample flats, replace with dynamic data -->
                                        <option value="1">Flat 101</option>
                                        <option value="2">Flat 102</option>
                                        <option value="3">Flat 103</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="client" name="client"
                                        placeholder="Enter Client..." required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Name..." required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control" id="picture" name="picture"
                                        aria-describedby="pictureHelp" required>
                                    <small id="pictureHelp" class="form-text text-muted">Choose a picture to upload
                                        (Customer/Driver).</small>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="id" name="id"
                                        placeholder="Enter ID (Passport/Driver License)..." required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address..." required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="country" name="country"
                                        placeholder="Enter Country..." required>
                                </div>
                                <div class="d-flex justify-content-center text-white">
                                    <button type="submit" class="btn btn-user btn-block w-50"
                                        style="background-color: #4ab242; font-size:18px; color:white; font-weight:bold;">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
