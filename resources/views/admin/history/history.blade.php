@extends('layout.admin')

@section('title', 'All Tenant History')

@section('content')
    <div class="container-fluid">
        <style>
            td {
                min-width: 100px;
            }

            /* Style for the search input */
            .search-container {
                margin-bottom: 20px;
            }

            .search-container input {
                width: 100%;
                padding: 10px;
                box-sizing: border-box;
                border: none;
            }

            /* Style for the CSV download button */
            .csv-download-btn {
                margin-bottom: 20px;
            }
        </style>
        <h1 class="h3 mb-2 text-gray-800">All Tenant History</h1>

        <!-- Search Form -->
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Search by client name...">
        </div>

        <!-- DataTables Example -->
        <div class="card mb-5 mt-5">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sr. No</th>
                                <th>Name</th>
                                <th>Agent Name</th>
                                <th>Flat No</th>
                                <th>Flat Rented</th>
                                <th>Total Amount Received</th>
                                <th>Total Remaining Balance</th>
                                <th>Rent Payment Date</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $key => $client)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $client->client_name }}</td>
                                    <td>{{ $client->agent_name ?? 'N/A' }}</td>
                                    <td>{{ $client->flat_number ?? 'N/A' }}</td>
                                    <td>${{ $client->flat_rent ?? 'N/A' }}</td>
                                    <td>${{ $client->total_amount_received ?? 'N/A' }}</td>
                                    <td>${{ $client->total_remaining_balance ?? 'N/A' }}</td>
                                    <td>{{ $client->payment_date ?? 'N/A' }}</td>
                                    <td>
                                        <div class="csv-download-btn">
                                            <a href="{{ route('history.downloadCsv', ['id' => $client->client_email]) }}"
                                                class="btn btn-primary mb-2">
                                                Export
                                            </a>
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

    <!-- JavaScript for Filtering -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('searchInput');
            var table = document.getElementById('dataTable2');
            var tableRows = table.getElementsByTagName('tr');

            searchInput.addEventListener('keyup', function() {
                var filter = searchInput.value.toLowerCase();

                for (var i = 1; i < tableRows.length; i++) {
                    var row = tableRows[i];
                    var nameCell = row.getElementsByTagName('td')[1]; // Name column index
                    if (nameCell) {
                        var nameText = nameCell.textContent || nameCell.innerText;
                        if (nameText.toLowerCase().indexOf(filter) > -1) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                }
            });
        });
    </script>
@endsection
