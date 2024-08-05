@extends('layout.admin')

@section('title', 'All Rental Appointments')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">All Rental Appointments</h1>
        <div class="card mb-5 mt-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Need</th>
                                <th>Additional Needs</th>
                                <th>Date of Coming</th>
                                <th>Location</th>
                                <th>Additional Requirements</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rentalAppointments as $index => $rentalAppointment)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $rentalAppointment->name }}</td>
                                    <td>{{ $rentalAppointment->email }}</td>
                                    <td>{{ $rentalAppointment->phone }}</td>
                                    <td>{{ $rentalAppointment->need }}</td>
                                    <td>{{ implode(', ', $rentalAppointment->additional_needs ?? []) }}</td>
                                    <td>{{ $rentalAppointment->date_of_coming }}</td>
                                    <td>{{ $rentalAppointment->location }}</td>
                                    <td>{{ $rentalAppointment->additional_requirements }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
