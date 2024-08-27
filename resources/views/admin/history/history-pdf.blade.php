<!DOCTYPE html>
<html>

<head>
    <title>Tenant History PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Tenant History: {{ $clientName }}</h1>

    <table>
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Primary Phone Number</th>
                <th>Address</th>
                <th>Country</th>
                <th>Agent Name</th>
                <th>Flat No</th>
                <th>Flat Rented</th>
                <th>Amount Received</th>
                <th>Remaining Balance</th>
                <th>Rent Payment Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $key => $client)
                @foreach ($rents->where('client_id', $client->id) as $rent)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $client->client_name }}</td>
                        <td>{{ $client->client_email }}</td>
                        <td>{{ $client->primary_phoneNo }}</td>
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->country }}</td>
                        <td>{{ $client->agent->name ?? 'N/A' }}</td>
                        <td>{{ $client->flat->flat_number ?? 'N/A' }}</td>
                        <td>${{ $client->flat->rent ?? 'N/A' }}</td>
                        <td>${{ $rent->amount_received ?? 'N/A' }}</td>
                        <td>${{ $rent->remaining_balance ?? 'N/A' }}</td>
                        <td>
                            @if ($rent->payment_date)
                                {{ \Carbon\Carbon::parse($rent->payment_date)->format('Y-m-d') }}
                            @else
                                N/A
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>

</html>
