<?php

namespace App\Http\Controllers;
use App\Models\PetDetails;
use App\Models\Adoption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    public function adoptionpage()
    {
        $pets = PetDetails::all();
        return view('adoption.adoptionpage', compact('pets'));
    }

    
    public function create()
    {
        return view('pets.create');
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer',
            'description' => 'required|string',
        ]);

       
        if ($request->hasFile('image')) {
            try {
                
                $imagePath = $request->file('image')->store('pets', 'public');

                PetDetails::create([
                    'image' => $imagePath,
                    'breed' => $request->breed,
                    'age' => $request->age,
                    'description' => $request->description,
                ]);

                return redirect()->route('pets.index')->with('status', 'Pet added successfully!');
            } catch (\Exception $e) {
                
                return redirect()->back()->withErrors(['error' => 'Failed to upload image. Please try again.']);
            }
        }else {
            
            return redirect()->back()->withErrors(['image' => 'Image upload failed. Please try again.']);
        }
    }
    
    public function edit($id)
    {
        $pet = PetDetails::findOrFail($id);
        return view('pets.edit', compact('pet'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'breed' => 'required|string|max:255',
            'age' => 'required|integer',
            'description' => 'required|string',
        ]);

        $pet = PetDetails::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($pet->image);
            $imagePath = $request->file('image')->store('pets', 'public');
            $pet->image = $imagePath;
        }

        $pet->update($request->only('breed', 'age', 'description'));

        return redirect()->route('pets.index')->with('status', 'Pet updated successfully!');
    }

    
    public function destroy($id)
    {
        $pet = PetDetails::findOrFail($id);
        Storage::disk('public')->delete($pet->image);
        $pet->delete();

        return redirect()->route('pets.index')->with('status', 'Pet deleted successfully!');
    }

    public function confirmDelete($id) {
        $pet = Petdetails::findOrFail($id);
        return view('pets.delete', compact('pet'));
    }

    public function index()
    {
        $pets = PetDetails::all();
        return view('pets.index', compact('pets'));
    }
    
}      
