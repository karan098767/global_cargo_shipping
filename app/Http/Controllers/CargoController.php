<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
   public function index()
{
    $cargos = Cargo::orderBy('id', 'desc')->get();
    return view('cargos.index', compact('cargos'));
}



    public function create()
    {
        return view('cargos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cargo_name' => 'required|string|max:150',
            'tracking_number' => 'required|string|max:100|unique:cargos',
            'weight' => 'required|numeric',
            'origin_port' => 'required|string|max:150',
            'destination_port' => 'required|string|max:150',
            'status' => 'required|string',
        ]);

        Cargo::create($validated);

        return redirect()->route('cargos.index')->with('success', 'Cargo added successfully!');
    }

    public function edit(Cargo $cargo)
    {
        return view('cargos.edit', compact('cargo'));
    }

    public function update(Request $request, Cargo $cargo)
    {
        $validated = $request->validate([
            'cargo_name' => 'required|string|max:150',
            'tracking_number' => 'required|string|max:100|unique:cargos,tracking_number,' . $cargo->id,
            'weight' => 'required|numeric',
            'origin_port' => 'required|string|max:150',
            'destination_port' => 'required|string|max:150',
            'status' => 'required|string',
        ]);

        $cargo->update($validated);

        return redirect()->route('cargos.index')->with('success', 'Cargo updated successfully!');
    }

    public function destroy(Cargo $cargo)
    {
        $cargo->update(['is_active' => false]);
        return redirect()->route('cargos.index')->with('success', 'Cargo deactivated successfully!');
    }
}
