<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showPawsAndProTips()
    {
        return view('paws_pro_tips'); 
    }

    public function showBestSellings()
    {
        return view('best_sellings'); 
    }
}
