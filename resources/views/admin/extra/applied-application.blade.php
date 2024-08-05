@extends('layout.admin')

@section('title', 'All Applications')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">All Applications</h1>
        <div class="card mb-5 mt-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Occupation</th>
                                <th>Course</th>
                                <th>Message</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applications as $index => $application)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $application->first_name }}</td>
                                    <td>{{ $application->last_name }}</td>
                                    <td>{{ $application->phone }}</td>
                                    <td>{{ $application->email }}</td>
                                    <td>{{ ucfirst($application->occupation) }}</td>
                                    <td>{{ $application->course }}</td>
                                    <td>{{ $application->message }}</td>
                                    <td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
