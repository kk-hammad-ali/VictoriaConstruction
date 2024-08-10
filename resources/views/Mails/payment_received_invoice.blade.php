<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Paid Invoice</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .paid-stamp {
            position: sticky;
            left: 20%;
            transform: rotate(-45deg);
            font-size: 2rem;
            text-align: center;
            color: red;
            border: 2px solid red;
            padding: 10px 20px;
            border-radius: 10px;
            width: 120px;
            margin: 25px 10px;
        }

        @media (max-width: 768px) {
            .paid-stamp {
                font-size: 1.5rem;
                width: 120px;
                margin: 25px 10px;
                text-align: center;
            }
        }
    </style>
</head>


<body>
    <div class="container my-5">
        <div class="card p-4 shadow-sm">
            <div class="d-flex justify-content-between mb-4">
                <div>
                    <img class="mb-3" src="{{ $logoUrl }}" alt="Company Logo" width="150">
                    <p>123 Main Street, Cityville, Country</p>
                    <p><strong>Email:</strong> info@company.com</p>
                    <p><strong>Phone:</strong> +1 234-567-8901</p>
                </div>
                <div class="text-end">
                    <h2 class="display-6">Invoice</h2>
                    <p><strong>Invoice Number:</strong> VC-{{ str_pad(rand(1, 9999999999), 10, '0', STR_PAD_LEFT) }}</p>
                    <p><strong>Date:</strong> {{ $date }}</p>
                </div>
            </div>

            <hr> <!-- Divider -->

            <div class="row mb-4">
                <div class="col-md-6">
                    <h4>Client Details</h4>
                    <p><strong>Name:</strong> {{ $client->client_name }}</p>
                    <p><strong>Email:</strong> {{ $client->client_email }}</p>
                    <p><strong>Address:</strong> {{ $client->address }}, {{ $client->country }}</p>
                    <p><strong>Phone:</strong> {{ $client->primary_phoneNo }}</p>
                </div>
                <div class="col-md-6 text-end">
                    <h4>Agent Details</h4>
                    <p><strong>Name:</strong> {{ $client->agent->name }}</p>
                    <p><strong>Email:</strong> {{ $client->agent->email }}</p>
                    <p><strong>Phone:</strong> {{ $client->agent->phone }}</p>
                    <p><strong>Address:</strong> {{ $client->agent->address }}</p>
                </div>
            </div>

            <hr> <!-- Divider -->

            <div class="row mb-4">
                <div class="col-md-6">
                    <h4>Flat Details</h4>
                    <p><strong>Property:</strong> {{ $client->property->name }}</p>
                    <p><strong>Flat Floor:</strong> {{ $client->flat->floor }}</p>
                    <p><strong>Rent Duration:</strong> {{ $client->start_date }} to {{ $client->end_date }}</p>
                </div>
            </div>

            <hr> <!-- Divider -->

            <div class="row mb-4">
                <div class="col-12 col-md-6">
                    <div class="paid-stamp">PAID</div>
                </div>
                <div class="col-12 col-md-6 text-end">
                    <p class="h5 mb-0"><strong>Total:</strong> $ {{ $client->flat->rent }}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
