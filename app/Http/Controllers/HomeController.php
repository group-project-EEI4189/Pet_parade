<?php

namespace App\Http\Controllers;
use App\Models\PetDetails;
use App\Models\Adoption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function home() {
        return view('home');
    }
}
