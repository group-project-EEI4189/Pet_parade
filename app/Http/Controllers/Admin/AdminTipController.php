<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tip;
use Illuminate\Http\Request;


class AdminTipController extends Controller
{
    public function index()
    {
        $tips = Tip::latest()->paginate(12);
        return view('admin.tips.index', compact('tips'));
    }

    public function create()
    {
        return view('admin.tips.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pet_type' => 'required|in:cat,dog,both',
            'category' => 'required|in:nutrition,health,grooming,training,general',
            'title'    => 'required|string|max:255',
            'body'     => 'required|string',
        ]);

        Tip::create($validated);

        return redirect()->route('admin.tips.index')
                         ->with('success', 'Tip published successfully!');
    }

   public function edit($id)
{
    $tip = Tip::findOrFail($id);
    return view('admin.tips.edit', compact('tip'));
}

    public function update(Request $request, $id)
{
    $tip = Tip::findOrFail($id);

    $tip->update($request->validate([
        'pet_type' => 'required|in:cat,dog,both',
        'category' => 'required|in:nutrition,health,grooming,training,general',
        'title'    => 'required|string|max:255',
        'body'     => 'required|string',
    ]));

    return redirect()->route('admin.tips.index')
                     ->with('success', 'Tip updated successfully!');
}

public function destroy($id)
{
    Tip::findOrFail($id)->delete();

    return redirect()->route('admin.tips.index')
                     ->with('success', 'Tip deleted successfully!');

}
}