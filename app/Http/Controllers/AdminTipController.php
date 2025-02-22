<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tip;

class AdminTipController extends Controller
{
    //
    public function index() {
        $tips = Tip::all(); // Fetch all tips
        return view('admin.tips', compact('tips'));
    }
    
    public function approve($id) {
        $tip = Tip::findOrFail($id);
        $tip->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Tip approved.');
    }
    
    public function destroy($id) {
        Tip::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Tip deleted.');
    }
    
}
