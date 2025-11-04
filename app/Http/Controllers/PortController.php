<?php

namespace App\Http\Controllers;

use App\Models\Port;
use Illuminate\Http\Request;

class PortController extends Controller
{
    public function index()
    {
        $ports = Port::where('is_active', true)->get();
        return view('ports.index', compact('ports'));
    }

    public function create()
    {
        return view('ports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'country' => 'required|string|max:100',
            'code' => 'required|string|max:10|unique:ports',
            'location' => 'nullable|string|max:255',
        ]);

        Port::create($validated);
        return redirect()->route('ports.index')->with('success', 'Port added successfully!');
    }

    public function edit(Port $port)
    {
        return view('ports.edit', compact('port'));
    }

    public function update(Request $request, Port $port)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'country' => 'required|string|max:100',
            'code' => 'required|string|max:10|unique:ports,code,' . $port->id,
            'location' => 'nullable|string|max:255',
        ]);

        $port->update($validated);
        return redirect()->route('ports.index')->with('success', 'Port updated successfully!');
    }

    public function destroy(Port $port)
    {
        $port->update(['is_active' => false]);
        return redirect()->route('ports.index')->with('success', 'Port deactivated successfully!');
    }
}
