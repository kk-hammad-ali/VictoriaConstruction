<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\User;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('user')->get(); // Load the user relationship
        return view('admin.properties.all-properties', compact('properties'));
    }


    public function adminAddProperty()
    {
        // $agents = User::where('role', 1)->pluck('name', 'id');
        return view('admin.properties.add-property');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // 'user_id' => 'required|exists:users,id', // Validate that the user_id exists in the users table
            'address' => 'required|string|max:255',
        ]);

        // Create the property with the validated data
        Property::create($validated);

        return redirect()->route('admin.all_property')->with('success', 'Property added successfully.');
    }



    public function editProperty($id)
    {
        $property = Property::findOrFail($id);
        return view('admin.properties.edit-property', compact('property'));
    }

    public function update(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'agent' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $property->update($validated);

        return redirect()->route('admin.all_property')->with('success', 'Property updated successfully.');
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('admin.all_property')->with('success', 'Property deleted successfully.');
    }
}
