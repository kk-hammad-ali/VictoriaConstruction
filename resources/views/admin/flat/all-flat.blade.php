@extends('layout.admin')

@section('title', 'All Flats')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">All Flats</h1>
        <div class="card mb-5 mt-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTableFlats" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Flat Number</th>
                                <th>Property</th>
                                <th>Agent</th>
                                <th>Floor</th>
                                <th>Rent</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($flats as $index => $flat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $flat->flat_number }}</td>
                                    <td>{{ $flat->property->name }}</td>
                                    <td>{{ $flat->user->name ?? 'N/A' }}</td>
                                    <td>{{ $flat->floor }}</td>
                                    <td>₤ {{ $flat->rent }}</td>
                                    <td>{{ $flat->status == 1 ? 'Rented' : 'Not Rented' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.edit_flat', $flat->id) }}"
                                                class="btn btn-warning">Edit</a>

                                            @if ($flat->status == 1)
                                                <form action="{{ route('admin.release_flat', $flat->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-secondary"
                                                        style="margin-left: 10px;"
                                                        onclick="return confirm('Are you sure you want to release this flat?');">
                                                        Release
                                                    </button>
                                                </form>
                                            @endif

                                            <form action="{{ route('admin.delete_flat', $flat->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" style="margin-left: 10px;"
                                                    onclick="return confirm('Are you sure you want to delete this flat?');">Delete</button>
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
