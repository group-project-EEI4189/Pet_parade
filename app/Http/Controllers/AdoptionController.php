<?php

namespace App\Http\Controllers;
use App\Models\Adoption;
use App\Models\PetDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdoptionController extends Controller
{
    public function adopt(Request $request) {
        return redirect()->route('pet.adoption')->with('status', 'Adoption request submitted!');
    }
    public function showForm($id)
    {
        $pet = PetDetails::findOrFail($id);  
        return view('adoption.form', compact('pet'));
    }
    
    public function submitAdoption(Request $request) {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
            'phone' => 'required',
        ]);
    
        Adoption::create([
            'pet_id' => $request->pet_id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('adoptionpage')->with('status', 'Adoption request submitted successfully!');
    }

    public function indexadoption()
    {
        $adoptions = Adoption::all();
        return view('pets.indexadoption', compact('adoptions'));
    }

    public function destroy($id)
    {
        $adoption = Adoption::findOrFail($id);
        $adoption->delete();
        return redirect()->route('pets.indexadoption')->with('status', 'Adoption request removed successfully!');
    }

}
