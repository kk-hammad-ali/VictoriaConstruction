@extends('layout.app')

@section('content')
    <div class="d-flex flex-column min-vh-100">
        <div class="container mt-5 text-center">
            <h2 class="mb-4 h1h1">Morello Construction Group Ltd offers end-to-end commercial solutions.</h2>
            <p>
                Our comprehensive fit-out and refurbishment service maximizes the potential of every space we engage with.
                Our goal is to comprehend your objectives and ensure that your new space harmonizes with your vision and
                practical requirements. At Morello construction group ltd, our team is dynamic, innovative, and comprises
                top-tier construction professionals renowned in Northamptonshire as the foremost local fit-out specialists.
            </p>
        </div>

        <div class="container mt-5 text-center">
            <h2 class="mb-4 h1h1">Click on the service to find out more or click on the button below to contact <br> our
                team…</h2>
            <button style="width: 20%; background-color: #FF5E14; border: none;" type="button" class="btn btn-primary">Contact
                our team</button>
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
        </div>
        <div class="container text-center my-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card border-primary">
                        <img src="{{ asset('img/our-popular services/cctv-768x513.jpg') }}" class="card-img-top"
                            alt="Aluminium & Upvc Windows">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">CCTV Installation</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-primary">
                        <img src="{{ asset('img/our-popular services/alarm-system-1-768x512.jpg') }}" class="card-img-top"
                            alt="Home Improvement">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Alarm System Installation</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-primary">
                        <img src="{{ asset('img/our-popular services/architecture-plans-768x576.jpg') }}"
                            class="card-img-top" alt="Electrical Installation">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Architecture Plans</h5>
                        </div>
                    </div>
                </div>
            </div>
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
    </div>
@endsection
