<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sword;
use Illuminate\Support\Facades\Storage;

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

    public function edit(Sword $sword)
    {
        if ((int) $sword->user_id !== (int) session('user_id')) {
            return redirect('/profile')->with('error', 'You can only edit your own swords.');
        }

        return view('sword-edit', compact('sword'));
    }

    public function update(Request $request, Sword $sword)
    {
        if ((int) $sword->user_id !== (int) session('user_id')) {
            return redirect('/profile')->with('error', 'You can only edit your own swords.');
        }

        $path = $sword->image;

        if ($request->hasFile('image')) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }

            $path = $request->file('image')->store('swords', 'public');
        }

        $sword->update([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'image' => $path,
        ]);

        return redirect('/profile')->with('success', 'Sword updated successfully.');
    }

    public function destroy(Sword $sword)
    {
        if ((int) $sword->user_id !== (int) session('user_id')) {
            return redirect('/profile')->with('error', 'You can only delete your own swords.');
        }

        if ($sword->image) {
            Storage::disk('public')->delete($sword->image);
        }

        $sword->delete();

        return redirect('/profile')->with('success', 'Sword deleted successfully.');
    }
}
