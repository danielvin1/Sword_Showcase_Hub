<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwordController extends Controller
{
    //use App\Models\Sword;
use Illuminate\Http\Request;

public function store(Request $request)
{
    $path = null;

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('swords', 'public');
    }

    Sword::create([
        'name' => $request->name,
        'type' => $request->type,
        'description' => $request->description,
        'image' => $path,
        'user_id' => auth()->id(),
    ]);

    return redirect('/feed');
}
}
