<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Victoria Constructions</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('js/style.js') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <header class="bg-dark text-white py-3 d-none d-lg-block">
        <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center">
            <div class="d-flex flex-column flex-lg-row">
                <a href="mailto:victoriaconstructions66@gmail.com"
                    class="text-decoration-none text-white me-lg-3 mb-2 mb-lg-0">
                    <i class="bi bi-envelope text-white"></i> victoriaconstructions66@gmail.com
                </a>
                <a href="tel:03301220085" class="text-decoration-none text-white">
                    <i class="bi bi-telephone text-white"></i> 03301220085
                </a>
            </div>
            <div class="d-flex flex-row">
                <a class="text-white text-decoration-none me-3" href="#"><i class="bi bi-facebook"></i></a>
                <a class="text-white text-decoration-none me-3" href="#"><i class="bi bi-twitter"></i></a>
                <a class="text-white text-decoration-none me-3" href="#"><i class="bi bi-instagram"></i></a>
                <a class="text-white text-decoration-none me-3" href="#"><i class="bi bi-linkedin"></i></a>
                <a class="text-white text-decoration-none" href="#"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Victoria Construction Logo"
                    style="width: 150px; height:85px; ">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav" id="second-nav-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.about_us') }}">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.our_services') }}">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.our_work') }}">OUR WORK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('public.our_team') }}">JOIN OUR TEAM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rental.appointment') }}">RENTAL APPOINTMENT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT US</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    <footer class="footer" style="background-color: #001940;">
        <div class="container footer-top">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-info">
                    <h3>About DevVE</h3>
                    <p>We pride ourselves on being one of the leading construction companies in the UK, with over a
                        decade of experience in delivering high-quality construction projects.</p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="d-inline-flex align-items-center"><i
                                    class="bx bx-chevron-right me-2"></i> Home Improvement</a></li>
                        <li><a href="#" class="d-inline-flex align-items-center"><i
                                    class="bx bx-chevron-right me-2"></i> Flooring Installation</a></li>
                        <li><a href="#" class="d-inline-flex align-items-center"><i
                                    class="bx bx-chevron-right me-2"></i> Electrical Installation</a></li>
                        <li><a href="#" class="d-inline-flex align-items-center"><i
                                    class="bx bx-chevron-right me-2"></i> Office Refurbishment</a></li>
                        <li><a href="#" class="d-inline-flex align-items-center"><i
                                    class="bx bx-chevron-right me-2"></i> Painting And Decorating</a></li>
                        <li><a href="#" class="d-inline-flex align-items-center"><i
                                    class="bx bx-chevron-right me-2"></i> Aluminium & Upvc Windows</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Important Links</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="d-inline-flex align-items-center"><i
                                    class="bx bx-chevron-right me-2"></i> ABOUT US</a></li>
                        <li><a href="#" class="d-inline-flex align-items-center"><i
                                    class="bx bx-chevron-right me-2"></i> SERVICES</a></li>
                        <li><a href="#" class="d-inline-flex align-items-center"><i
                                    class="bx bx-chevron-right me-2"></i> OUR WORK</a></li>
                        <li><a href="#" class="d-inline-flex align-items-center"><i
                                    class="bx bx-chevron-right me-2"></i> JOIN OUR TEAM</a></li>
                        <li><a href="#" class="d-inline-flex align-items-center"><i
                                    class="bx bx-chevron-right me-2"></i> RENTAL APPOINTMENT</a></li>
                        <li><a href="#" class="d-inline-flex align-items-center"><i
                                    class="bx bx-chevron-right me-2"></i> CONTACT US</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 form-search-bar">
                    <h4>SEARCH</h4>
                    <form action="" method="post" class="d-flex">
                        <input type="email" name="email" class="form-control me-2" placeholder="Your Email">
                        <button type="submit" class="btn">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="container text-center py-3">
            <strong class="d-block">Copyright &copy; <span>Victoria Constructions</span>. All Rights Reserved</strong>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
