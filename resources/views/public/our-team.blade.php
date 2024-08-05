@extends('layout.app')

@section('content')
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
    </div>
    <div class="container mt-5 p-5 bg-light rounded shadow mb-5"
        style="background: linear-gradient(to bottom, #d0d2d3, #1E3778);">
        <h2 class="text-center mb-4">APPLY NOW</h2>
        <form action="{{ route('public.store_application') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="first_name" class="form-label">Enter your first name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label">Enter your last name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="phone" class="form-label">Enter your phone number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Enter your email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="occupation" class="form-label">Select your occupation</label>
                    <select class="form-select" id="occupation" name="occupation" required>
                        <option value="" disabled selected>Select Your Occupation</option>
                        <option value="student">Student</option>
                        <option value="civil">Civil</option>
                        <option value="learner">Learner</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="course" class="form-label">Choose your course</label>
                    <select class="form-select" id="course" name="course" required>
                        <option value="" disabled selected>Select Your Course</option>
                        <option value="Office Refurbishment">Office Refurbishment</option>
                        <option value="Flooring Installation">Flooring Installation</option>
                        <option value="Home Improvement">Home Improvement</option>
                        <option value="Electrical Installation">Electrical Installation</option>
                        <option value="Painting and Decorating">Painting and Decorating</option>
                        <option value="Aluminum & Upvc Window">Aluminum & Upvc Window</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Enter your message</label>
                <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" style="background-color: #e55a00 border: none;">SEND
                    MESSAGE</button>
            </div>
        </form>
    </div>
@endsection
