<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Invoice</title>
</head>

<body>

    <!-- Invoice 1 - Bootstrap Brain Component -->
    <section class="py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9 col-xl-8 col-xxl-7">
                    <div class="row gy-3 mb-3">
                        <div class="col-6">
                            <h2 class="text-uppercase text-end m-0">Invoice</h2>
                            <span class="col-6 text-sm-end">INT-001</span>
                        </div>
                        <div class="col-6">
                            <a class="d-block text-end" href="#!">
                                <img src="./assets/img/bsb-logo.svg" class="img-fluid" alt="BootstrapBrain Logo"
                                    width="135" height="44">
                            </a>
                        </div>

                        <div class="col-12">
                            <h4>From</h4>
                            <address>
                                <strong>BootstrapBrain</strong><br>
                                875 N Coast Hwy<br>
                                Laguna Beach, California, 92651<br>
                                United States<br>
                                Phone: (949) 494-7695<br>
                                Email: email@domain.com
                            </address>
                        </div>

                            <div class="col-md-6">
                            <h4>Account Details</h4>
                            <div class="row">
                                <div class="col-6">Account</div>
                                <div class="col-6 text-end">786-54984</div>
                                <div class="col-6">Order ID</div>
                                <div class="col-6 text-end">#9742</div>
                                <div class="col-6">Start Date</div>
                                <div class="col-6 text-end">12/10/2025</div>
                                <div class="col-6">End Date</div>
                                <div class="col-6 text-end">18/12/2025</div>
                            </div>
                        </div>
                    </div>

                    <!-- Row for Bill To and Account -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h4>Bill To</h4>
                            <address>
                                <strong>Mason Carter</strong><br>
                                7657 NW Prairie View Rd<br>
                                Kansas City, Mississippi, 64151<br>
                                United States<br>
                                Phone: (816) 741-5790<br>
                                Email: email@client.com
                            </address>
                        </div>
                        <div class="col-md-6">
                            <h4>Account Details</h4>
                            <div class="row">
                                <div class="col-6">Account</div>
                                <div class="col-6 text-end">786-54984</div>
                                <div class="col-6">Order ID</div>
                                <div class="col-6 text-end">#9742</div>
                                <div class="col-6">Start Date</div>
                                <div class="col-6 text-end">12/10/2025</div>
                                <div class="col-6">End Date</div>
                                <div class="col-6 text-end">18/12/2025</div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-uppercase">Product</th>
                                            <th scope="col" class="text-uppercase text-end">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <tr>
                                            <td>Console - Bootstrap Admin Template</td>
                                            <td class="text-end">150</td>
                                        </tr>
                                        <tr>
                                            <td>Planet - Bootstrap Blog Template</td>
                                            <td class="text-end">29</td>
                                        </tr>
                                        <tr>
                                            <td>Hello - Bootstrap Business Template</td>
                                            <td class="text-end">128</td>
                                        </tr>
                                        <tr>
                                            <td>Palette - Bootstrap Startup Template</td>
                                            <td class="text-end">55</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="3" class="text-uppercase text-end">Total</th>
                                            <td class="text-end">$495.1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
