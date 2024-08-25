<?php
namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Property;
use Illuminate\Http\Request;

class FlatController extends Controller
{
    public function index()
    {
        $flats = Flat::with('property')->get();
        return view('admin.flat.all-flat', compact('flats'));
    }

    public function adminAddFlat()
    {
        $properties = Property::all();
        return view('admin.flat.add-flat', compact('properties'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'property' => 'required|exists:properties,id',
            'flat_number' => 'required|string|max:255',
            'floor' => 'required|string|max:255',
            'rent' => 'required|numeric',
        ]);

        Flat::create([
            'property_id' => $request->property,
            'flat_number' => $request->flat_number,
            'floor' => $request->floor,
            'rent' => $request->rent,
        ]);

        return redirect()->route('admin.all_flat')->with('success', 'Flat added successfully.');
    }

    public function editFlat($id)
    {
        $flat = Flat::findOrFail($id);
        $properties = Property::all();
        return view('admin.flat.edit-flat', compact('flat', 'properties'));
    }

    public function update(Request $request, $id)
    {
        $flat = Flat::findOrFail($id);

        $validated = $request->validate([
            'property' => 'required|exists:properties,id',
            'flat_number' => 'required|string|max:255',
            'floor' => 'required|string|max:255',
            'rent' => 'required|numeric',
        ]);

        $flat->update([
            'property_id' => $request->property,
            'flat_number' => $request->flat_number,
            'floor' => $request->floor,
            'rent' => $request->rent,
        ]);

        return redirect()->route('admin.all_flat')->with('success', 'Flat updated successfully.');
    }

    public function destroy($id)
    {
        $flat = Flat::findOrFail($id);
        $flat->delete();

        return redirect()->route('admin.all_flat')->with('success', 'Flat deleted successfully.');
    }

    public function releaseFlat($id)
    {
        $flat = Flat::findOrFail($id);

        if ($flat->status == 1) { // If the flat is occupied
            $flat->status = 0; // Set status to 'Not Rented'
            $flat->save();

            return redirect()->route('admin.all_flat')->with('success', 'Flat released successfully.');
        }

        return redirect()->route('admin.all_flat')->with('error', 'Flat is already not rented.');
    }
}
