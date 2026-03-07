<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PetDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    public function index()
    {
        $pets = PetDetails::all();
        return view('admin.pets.index', compact('pets'));
    }

    public function create()
    {
        return view('admin.pets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'breed' => 'required',
            'age' => 'required|integer',
            'description' => 'required',
            'image' => 'required|image|max:2048'
        ]);

        $imagePath = $request->file('image')->store('pets', 'public');

        PetDetails::create([
            'breed' => $request->breed,
            'age' => $request->age,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.pets.index')->with('success', 'Pet added successfully');
    }

    public function edit($id)
    {
        $pet = PetDetails::findOrFail($id);
        return view('admin.pets.edit', compact('pet'));
    }

    public function update(Request $request, $id)
    {
        $pet = PetDetails::findOrFail($id);

        $request->validate([
            'breed' => 'required',
            'age' => 'required|integer',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($pet->image);
            $pet->image = $request->file('image')->store('pets', 'public');
        }

        $pet->update($request->only('breed', 'age', 'description'));

        return redirect()->route('admin.pets.index')->with('success', 'Pet updated successfully');
    }

    public function destroy($id)
    {
        $pet = PetDetails::findOrFail($id);
        Storage::disk('public')->delete($pet->image);
        $pet->delete();

        return back()->with('success', 'Pet deleted');
    }
}