<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::where('is_active', true)->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:clients',
            'phone' => 'nullable|string|max:50',
            'company_name' => 'nullable|string|max:150',
            'address' => 'nullable|string',
            'country' => 'nullable|string|max:100',
        ]);

        Client::create($validated);

        return redirect()->route('clients.index')->with('success', 'Client added successfully.');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone' => 'nullable|string|max:50',
            'company_name' => 'nullable|string|max:150',
            'address' => 'nullable|string',
            'country' => 'nullable|string|max:100',
        ]);

        $client->update($validated);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->update(['is_active' => false]);
        return redirect()->route('clients.index')->with('success', 'Client deactivated.');
    }
}
