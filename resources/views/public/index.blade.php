@extends('layout.main')

@section('content')
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/worker.jpg') }}" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/construction.jpg') }}" class="d-block w-100" style="height: 100vh" alt="Image 2">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('img/construction-worker.jpg') }}" class="img-fluid rounded" alt="Construction Image">
            </div>
            <div class="col-md-6">
                <h2>Building Dreams, Shaping Futures</h2>
                <p>At Morello construction group ltd, we pride ourselves on being one of the leading construction companies
                    in the UK, with over a decade of experience in delivering high-quality construction projects. Founded in
                    2000, we have steadily grown and established ourselves as a reliable partner for all construction needs.
                </p>
                <h4>How can I take your service?</h4>
                <p>To take our services, call us today or email us to get a quote.</p>
                <p>Call: 03301220085<br>Email: <a
                        class="text-decoration-none text-black">victoriaconstructions66@gmail.com</a></p>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('img/commercial-refurbishment.jpg') }}" class="img-fluid rounded"
                    alt="Office Renovation">
            </div>
            <div class="col-md-6">
                <h2 class="text-uppercase">Experts in Commercial Renovation</h2>
                <p>Our mission is to create functional work environments that foster business expansion. Collaborating
                    closely with businesses and residential developers, we specialize in comprehensive interior fit-outs on
                    a large scale. Our refurbishment expertise spans dry lining, suspended ceilings, mezzanine flooring,
                    decorating, dilapidations, office relocation, redesigning, and furniture solutions, catering to offices,
                    schools, and warehouses in central England.</p>
                <a href="#" class="btn btn-warning text-uppercase">Contact Our Team</a>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="text-uppercase">Elevating Commercial Spaces <br> Since 2015</h2>
                <p>Rest assured, we’ll handle the entire journey from concept to realization. With our expertise, we’ll
                    transform your vision into fully rendered 3D designs, while staying within agreed budgets and timelines.
                    Let us manage everything for you.</p>
                <a href="#" class="btn btn-warning text-uppercase">Contact Our Team</a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('img/office.jpg') }}" class="img-fluid rounded" alt="Office Space">
            </div>
        </div>
    </div>
    <div class="container-fluid p-0 mb-5">
        <div class="position-relative text-center text-white"
            style="background-image: url('img/construction.jpg'); background-size: cover; background-position: center; height: 70vh;">
            <div class="position-absolute top-50 start-50 translate-middle text-center">
                <h1>Morello construction group ltd provides comprehensive commercial refurbishment services from start to
                    finish.</h1>
                <a href="#" class="btn btn-warning mt-4 text-uppercase">Learn More</a>
            </div>
        </div>
    </div>
    <div class="container text-center my-5">
        <h2 class="text-uppercase">Our Popular Services</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card border-primary">
                    <img src="{{ asset('img/our-popular services/office-refurbishment.jpg') }}" class="card-img-top"
                        alt="Office Refurbishment">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Office Refurbishment</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-primary">
                    <img src="{{ asset('img/our-popular services/floor-installation.jpg') }}" class="card-img-top"
                        alt="Flooring Installation">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Flooring Installation</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-primary">
                    <img src="{{ asset('img/our-popular services/painting-decorating.jpg') }}" class="card-img-top"
                        alt="Painting and Decorating">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Painting and Decorating</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-primary">
                    <img src="{{ asset('img/our-popular services/aluminium-upvc.jpg') }}" class="card-img-top"
                        alt="Aluminium & Upvc Windows">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Aluminium & Upvc Windows</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-primary">
                    <img src="{{ asset('img/our-popular services/home-improvement.jpg') }}" class="card-img-top"
                        alt="Home Improvement">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Home Improvement</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-primary">
                    <img src="{{ asset('img/our-popular services/electrical-installation.jpg') }}" class="card-img-top"
                        alt="Electrical Installation">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Electrical Installation</h5>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-warning text-uppercase mt-5">View More Services</a>
    </div>

    <div class="container text-center my-5">
        <h2 class="text-uppercase">Our Work Progress</h2>
        <div class="row justify-content-center">
            <div class="col-6 col-sm-6 col-md-3 mb-4 d-flex flex-column align-items-center">
                <div class="progress-circle" id="circle1">
                    <div class="inner">75%</div>
                </div>
                <div class="progress-title mt-2">Project Done</div>
            </div>
            <div class="col-6 col-sm-6 col-md-3 mb-4 d-flex flex-column align-items-center">
                <div class="progress-circle" id="circle2">
                    <div class="inner">90%</div>
                </div>
                <div class="progress-title mt-2">Happy Clients</div>
            </div>
            <div class="col-6 col-sm-6 col-md-3 mb-4 d-flex flex-column align-items-center">
                <div class="progress-circle" id="circle3">
                    <div class="inner">68%</div>
                </div>
                <div class="progress-title mt-2">Completed Co.</div>
            </div>
            <div class="col-6 col-sm-6 col-md-3 mb-4 d-flex flex-column align-items-center">
                <div class="progress-circle" id="circle4">
                    <div class="inner">80%</div>
                </div>
                <div class="progress-title mt-2">Country Cover</div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('img/trainingprogram.jpg') }}" class="img-fluid rounded border border-primary"
                    alt="Training Program Image">
            </div>
            <div class="col-md-6">
                <h2 class="text-primary">Our Training Program</h2>
                <p>
                    Our training program is designed to cover a wide range of essential skills and knowledge required in the
                    construction industry. Whether you’re a beginner or university student looking to enter the field or an
                    experienced professional seeking to enhance your expertise, our courses cater to various skill levels
                    and interests.
                </p>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-md-6 order-md-2">
                <img src="{{ asset('img/training-certificate.jpg') }}" class="img-fluid rounded border border-primary"
                    alt="Training Program Image">
            </div>
            <div class="col-md-6 order-md-1">
                <h2 class="text-primary">Your Gateway to Excellence in Construction</h2>
                <p>
                    At Morello construction group ltd, we are dedicated to not only providing exceptional construction
                    services but also nurturing the next generation of skilled professionals in the industry. Our
                    comprehensive training programs equip individuals with the knowledge and practical skills needed to
                    succeed in the construction field, backed by a certificate upon completion.
                </p>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="#" class="btn btn-warning text-uppercase">Join Our Training Program</a>
        </div>
    </div>
    <div class="container-fluid p-0 mb-5">
        <div class="bg-dark text-white d-flex align-items-center justify-content-center"
            style="height: 400px; background: url('img/construction.jpg') no-repeat center center; background-size: cover;">
            <div class="text-center">
                <h2 class="fw-bold">DO YOU HAVE ANY<br> QUESTION? FEEL FREE TO<br> CONTACT US.</h2>
                <a href="#" class="btn btn-warning text-uppercase mt-3">Contact Us</a>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <div class="row">
            <!-- Left Column with Contact Info -->
            <div class="col-md-6">
                <h6 class="text-uppercase text-warning">Contact With Us</h6>
                <h2 class="text-primary fw-bold mb-4">Speak With Our Consultant</h2>
                <div class="mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <!-- Icon -->
                            <i class="bi bi-chat-dots fs-2"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Call Anytime</h6>
                            <p class="mb-0">03301220085</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="me-3">
                            <!-- Icon -->
                            <i class="bi bi-envelope-fill fs-2 text-warning"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Send Email</h6>
                            <p class="mb-0 text-danger">victoriaconstructions66@gmail.com</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <!-- Icon -->
                            <i class="bi bi-geo-alt-fill fs-2"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Visit Office</h6>
                            <p class="mb-0">17a Victoria Street, Wolverhampton, City Centre, WV13NP</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column with Contact Form -->
            <div class="col-md-6">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" class="form-control" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Phone" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Subject" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="5" placeholder="Write Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning text-uppercase">Send a Message</button>
                </form>
            </div>
        </div>
    </div>
@endsection
