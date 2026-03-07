<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;

class TipController extends Controller
{
    public function index(Request $request)
{
    $tips = Tip::when($request->filter, function ($query, $filter) {
                    $query->where('pet_type', $filter)
                          ->orWhere('pet_type', 'both');
                })
                ->latest()
                ->paginate(12);

    return view('tipspage', compact('tips'));
}
}