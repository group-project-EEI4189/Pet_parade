<?php

namespace App\Http\Controllers;

use App\Models\PetDetails;
use App\Models\Adoption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdoptionConfirmation;


class AdoptionController extends Controller
{
    public function adoptionPage()
    {
        $pets = PetDetails::all();
        return view('adoption.adoptionpage', compact('pets'));
    }

    public function showForm($id)
    {
        $pet = PetDetails::findOrFail($id);
        return view('adoption.form', compact('pet'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'pet_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $adoption = Adoption::create([
            'pet_id' => $request->pet_id,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        Mail::to($request->email)->send(new AdoptionConfirmation($adoption));


        return redirect()
            ->route('adoption.page')
            ->with('success', 'Your adoption request has been submitted successfully!');
    }
}