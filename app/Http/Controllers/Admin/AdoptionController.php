<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Adoption;

class AdoptionController extends Controller
{
    public function indexadoption()
    {
        $adoptions = Adoption::with('pet')->get();
        return view('admin.adoptions.indexadoption', compact('adoptions'));
    }

    public function destroy($id)
    {
        Adoption::findOrFail($id)->delete();
        return back()->with('success', 'Adoption deleted');
    }
}