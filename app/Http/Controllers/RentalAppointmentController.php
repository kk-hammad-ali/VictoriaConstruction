<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentalAppointment;

class RentalAppointmentController extends Controller
{
    public function index()
    {
        return view('public.rental-appointment');
    }


    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'photo' => 'nullable|image|max:2048',
            'phone' => 'required|string|max:20',
            'need' => 'required|string',
            'additional_needs' => 'nullable|array',
            'date_of_coming' => 'required|date',
            'location' => 'required|string|max:255',
            'id_card' => 'nullable|image|max:2048',
            'driving_license' => 'nullable|image|max:2048',
            'additional_requirements' => 'nullable|string',
        ]);

        // Handle file uploads
        $photoPath = $request->file('photo') ? $request->file('photo')->store('photos') : null;
        $idCardPath = $request->file('id_card') ? $request->file('id_card')->store('id_cards') : null;
        $drivingLicensePath = $request->file('driving_license') ? $request->file('driving_license')->store('driving_licenses') : null;

        // Create a new rental appointment record in the database
        RentalAppointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $photoPath,
            'phone' => $request->phone,
            'need' => $request->need,
            'additional_needs' => $request->additional_needs,
            'date_of_coming' => $request->date_of_coming,
            'location' => $request->location,
            'id_card' => $idCardPath,
            'driving_license' => $drivingLicensePath,
            'additional_requirements' => $request->additional_requirements,
        ]);

        // Redirect back with a success message
        return redirect()->route('rental.appointment')->with('success', 'Rental appointment booked successfully.');
    }
    public function allRentalAppointments()
    {
        $rentalAppointments = RentalAppointment::all();
        return view('admin.extra.rental-appointment', compact('rentalAppointments'));
    }
}
