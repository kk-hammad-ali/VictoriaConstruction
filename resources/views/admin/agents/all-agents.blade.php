@extends('layout.admin')

@section('title', 'All Agents')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">All Agents</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                @if (session('generated_password'))
                    <br>
                    <strong>Generated Password: {{ session('generated_password') }}</strong>
                @endif
            </div>
        @endif

        <div class="card mb-5 mt-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Identification Type</th>
                                <th>Identification Number</th>
                                <th>Picture</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agents as $index => $agent)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ ucfirst(str_replace('_', ' ', $agent->identification_type)) }}</td>
                                    <td>{{ $agent->identification_number }}</td>
                                    <td>
                                        @if ($agent->picture)
                                            <img src="{{ asset($agent->picture) }}" alt="Agent Picture" width="50">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $agent->name }}</td>
                                    <td>{{ $agent->email }}</td>
                                    <td>{{ $agent->phone }}</td>
                                    <td>{{ $agent->address }}</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="{{ route('admin.edit_agent', $agent->id) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('admin.delete_agent', $agent->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this agent?');">Delete</button>
                                            </form>
                                        </div>
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
