<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class OurTeamController extends Controller
{
    // Display the application form and the "Our Team" page
    public function index()
    {
        return view('public.our-team');
    }

    // Store a new application in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:applications,email',
            'occupation' => 'required|string',
            'course' => 'required|string',
            'message' => 'required|string',
        ]);

        // Create a new application record in the database
        Application::create($request->all());

        // Redirect back with a success message
        return redirect()->route('public.our_team')->with('success', 'Application submitted successfully.');
    }

    // Display all applications
    public function allApplications()
    {
        $applications = Application::all();
        return view('admin.extra.applied-application', compact('applications'));
    }
}
