@extends('layout.admin')

@section('title', 'All Clients')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">All Clients</h1>
        <!-- DataTables Example -->
        <div class="card mb-5 mt-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Client</th>
                                <th>Name</th>
                                <th>Picture</th>
                                <th>ID</th>
                                <th>Address</th>
                                <th>Country</th>
                                <th>Agent Name</th>
                                <th>Flat Rented</th>
                                <th>Rent Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Customer</td>
                                <td>John Doe</td>
                                <td><img src="{{ asset('uploads/clients/john_doe.jpg') }}" alt="John Doe" width="50">
                                </td>
                                <td>Passport: A1234567</td>
                                <td>123 Elm Street, Springfield</td>
                                <td>USA</td>
                                <td>Jane Smith</td>
                                <td>Flat 101, 123 Elm Street</td>
                                <td>$1200</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
