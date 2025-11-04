<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Ship;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    public function index()
    {
        $crew = Crew::with('ship')->where('is_active', true)->get();
        return view('crew.index', compact('crew'));
    }

    public function create()
    {
        $ships = Ship::where('is_active', true)->get();
        return view('crew.create', compact('ships'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ship_id' => 'nullable|exists:ships,id',
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'role' => 'required|string',
            'phone_number' => 'required|string|max:30|unique:crew',
            'nationality' => 'nullable|string|max:100',
        ]);

        Crew::create($validated);

        return redirect()->route('crew.index')->with('success', 'Crew member added successfully!');
    }

    public function edit(Crew $crew)
    {
        $ships = Ship::where('is_active', true)->get();
        return view('crew.edit', compact('crew', 'ships'));
    }

    public function update(Request $request, Crew $crew)
    {
        $validated = $request->validate([
            'ship_id' => 'nullable|exists:ships,id',
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'role' => 'required|string',
            'phone_number' => 'required|string|max:30|unique:crew,phone_number,' . $crew->id,
            'nationality' => 'nullable|string|max:100',
        ]);

        $crew->update($validated);

        return redirect()->route('crew.index')->with('success', 'Crew member updated successfully!');
    }

    public function destroy(Crew $crew)
    {
        $crew->update(['is_active' => false]);
        return redirect()->route('crew.index')->with('success', 'Crew member deactivated.');
    }
}

