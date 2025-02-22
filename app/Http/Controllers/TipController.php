<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tip;

class TipController extends Controller
{

    public function store(Request $request) {


        $request->validate([
            'tab_name' => 'required|string|max:50',
            'content' => 'required|string',
        ]);
    
        Tip::create([
            'tab_name' => $request->tab_name,
            'content' => $request->content,
            'status' => 'pending',
        ]);
    
        return redirect()->back()->with('success', 'Tip added successfully. Awaiting approval.');
    }
    public function showTips()
    {
        $tips = Tip::all();
        return view('tips', compact('tips'));
    }
    
    //
}
