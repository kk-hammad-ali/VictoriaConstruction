@extends('layout.admin')

@section('title', 'All Properties')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">All Properties</h1>
        <div class="card mb-5 mt-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Name</th>
                                <th>Agent</th>
                                <th>Address</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($properties as $index => $property)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $property->name }}</td>
                                    <td>{{ $property->user->name ?? 'N/A' }}</td> 
                                    <td>{{ $property->address }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit_property', $property->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('admin.delete_property', $property->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this property?');">Delete</button>
                                        </form>
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
