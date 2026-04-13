<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sword;
use Illuminate\Support\Facades\Storage;

class SwordController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('swords', 'public');
        }

        Sword::create([
            'name'        => $validated['name'],
            'type'        => $validated['type'],
            'description' => $validated['description'],
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

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = $sword->image;

        if ($request->hasFile('image')) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }

            $path = $request->file('image')->store('swords', 'public');
        }

        $sword->update([
            'name' => $validated['name'],
            'type' => $validated['type'],
            'description' => $validated['description'],
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
