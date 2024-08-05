@extends('layout.app')

@section('content')
    <div class="d-flex flex-column min-vh-80">
        <div class="container mt-5 text-center">
            <h2 class="mb-4 text-danger text-start">LETS BOOK APPOINTMENT.</h2>
        </div>
        <div class="container mt-5 text-center">
            <h2 class="mb-4 fw-bold text-primary text-start">WE OFFER RENTAL SERVICES.</h2>
            <p>
                Renting in the UK offers a variety of options, including apartments, rooms, and houses, each with its unique benefits and drawbacks. Apartments, ranging from studios to luxury units, offer amenities and maintenance services but generally provide less space and privacy. Room rentals, either in shared apartments or private homes, are cost-effective and flexible but require good compatibility with roommates and come with shared spaces. Houses, including single-family homes, townhouses, and duplexes, provide more space and privacy, making them ideal for families, but they are usually more expensive and may require tenant maintenance. When choosing a rental, it's important to consider your budget, lease terms, location, and personal preferences to find the best fit for your needs.
            </p>
        </div>
        <div class="container mt-5 text-center">
            <h2 class="mb-4 fw-bold text-primary">SCHEDULE APPOINTMENT.</h2>
        </div>
        <div class="container mt-5">
            <form action="{{ route('rental.appointment.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label text-danger">Your Name *</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your name" required>
                    </div>
                    <div class="col">
                        <label for="email" class="form-label text-danger">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="photo" class="form-label text-danger">Upload Your Photo *</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="col">
                        <label for="phone" class="form-label text-danger">Phone/Mobile *</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="+1 (456) 567-7890" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label text-danger">What you need? *</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="need" id="separateRoom" value="Separate Room" required>
                            <label class="form-check-label" for="separateRoom">Separate Room</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="need" id="sharedRoom" value="Shared Room">
                            <label class="form-check-label" for="sharedRoom">Shared Room</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="need" id="houseForRent" value="House for Rent">
                            <label class="form-check-label" for="houseForRent">House for Rent</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="need" id="apartmentForRent" value="Apartment for Rent">
                            <label class="form-check-label" for="apartmentForRent">Apartment for Rent</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="need" id="lounge" value="Lounge">
                            <label class="form-check-label" for="lounge">Lounge</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="need" id="farmhouse" value="Farmhouse">
                            <label class="form-check-label" for="farmhouse">Farmhouse</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="need" id="other" value="Other">
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>
                    <div class="col">
                        <label class="form-label text-danger">You Need?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="furnishedRoom" name="additional_needs[]" value="Furnished Room">
                            <label class="form-check-label" for="furnishedRoom">Furnished Room</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="unfurnishedRoom" name="additional_needs[]" value="Unfurnished Room">
                            <label class="form-check-label" for="unfurnishedRoom">Unfurnished Room</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="apartment" name="additional_needs[]" value="Apartment">
                            <label class="form-check-label" for="apartment">Apartment</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="privateRoom" name="additional_needs[]" value="Private Room">
                            <label class="form-check-label" for="privateRoom">Private Room</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="sharedRoomCheck" name="additional_needs[]" value="Shared Room">
                            <label class="form-check-label" for="sharedRoomCheck">Shared Room</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="parking" name="additional_needs[]" value="Parking / Garage">
                            <label class="form-check-label" for="parking">Parking / Garage</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="streetParking" name="additional_needs[]" value="Street Parking">
                            <label class="form-check-label" for="streetParking">Street Parking</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="date" class="form-label text-danger">Date of Coming</label>
                        <input type="date" class="form-control" id="date" name="date_of_coming" required>
                    </div>
                    <div class="col">
                        <label for="location" class="form-label text-danger">Choose a Location *</label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="London" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="idCard" class="form-label text-danger">Upload Your ID Card *</label>
                        <input type="file" class="form-control" id="idCard" name="id_card">
                    </div>
                    <div class="col">
                        <label for="drivingLicense" class="form-label text-danger">Upload Your Driving License *</label>
                        <input type="file" class="form-control" id="drivingLicense" name="driving_license">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="additionalRequirements" class="form-label text-danger">Any Additional Requirements</label>
                    <textarea class="form-control" id="additionalRequirements" name="additional_requirements" rows="3" placeholder="like attach bath etc, 2 rooms"></textarea>
                </div>
                <div class="text-center mb-5">
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
