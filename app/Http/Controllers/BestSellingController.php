<?php

namespace App\Http\Controllers;

use App\Models\BestSelling;
use Illuminate\Http\Request;

class BestSellingController extends Controller
{
   public function index()
   {
     $bestSellers = BestSelling::latest()->get();
     return view('sellingpage', compact('bestSellers'));
   }
}