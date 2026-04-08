<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sword;

class SwordController extends Controller
{
    public function store(Request $request)
    {
        $path = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('swords', 'public');
        }

        Sword::create([
            'name'        => $request->name,
            'type'        => $request->type,
            'description' => $request->description,
            'image'       => $path,
            'user_id'     => session('user_id'),
        ]);

        return redirect('/feed');
    }
}
