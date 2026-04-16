<?php

namespace App\Http\Controllers;

use App\Models\SwordOrder;
use Illuminate\Http\Request;

class SwordOrderController extends Controller
{
    public function store(Request $request)
    {
        if (! session('user_id')) {
            return redirect('/register')->with('error', 'Please create an account to place an order.');
        }

        $validated = $request->validate([
            'sword_name' => 'required|string|max:120',
            'sword_type' => 'required|string|max:100',
            'budget' => 'nullable|string|max:60',
            'timeline' => 'nullable|string|max:60',
            'description' => 'nullable|string|max:1200',
        ]);

        SwordOrder::create([
            'user_id' => session('user_id'),
            'sword_name' => $validated['sword_name'],
            'sword_type' => $validated['sword_type'],
            'budget' => $validated['budget'] ?? null,
            'timeline' => $validated['timeline'] ?? null,
            'description' => $validated['description'] ?? null,
            'status' => 'Open',
        ]);

        return back()->with('success', 'Your sword order has been placed.');
    }
}