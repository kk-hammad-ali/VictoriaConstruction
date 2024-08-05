@extends('layout.admin')

@section('title', 'Edit Client')

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
                                <h1 class="h4 text-gray-900">Edit Client</h1>
                            </div>
                            <form class="user" enctype="multipart/form-data" method="POST"
                                action="{{ route('admin.update_client', $client->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="client" name="client"
                                        placeholder="Enter Client Type..." value="{{ $client->client }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter Name..." value="{{ $client->name }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="file" class="form-control" id="picture" name="picture"
                                        aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">Choose a file to upload.</small>
                                    @if ($client->picture)
                                        <p>Current file: <a href="{{ asset('uploads/clients/' . $client->picture) }}"
                                                target="_blank">{{ pathinfo($client->picture, PATHINFO_BASENAME) }}</a></p>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="id" name="id"
                                        placeholder="Enter ID..." value="{{ $client->id }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address..." value="{{ $client->address }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="country" name="country"
                                        placeholder="Enter Country..." value="{{ $client->country }}" required>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-user btn-block w-50"
                                        style="background-color: #4ab242; font-size:18px; font-weight:bold;">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
