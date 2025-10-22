<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;

class ShipmentController extends Controller
{
    // Show all shipments
    public function index()
    {
        $shipments = Shipment::all();
        return view('shipments.index', compact('shipments'));
    }

    // Show a single shipment
    public function show($id)
    {
        $shipment = Shipment::findOrFail($id);
        return view('shipments.show', compact('shipment'));
    }

    // Show form to create new shipment
    public function create()
    {
        return view('shipments.create');
    }

    // Store new shipment in the database
    public function store(Request $request)
    {
        $shipment = new Shipment();
        $shipment->tracking_number = $request->tracking_number;
        $shipment->sender_name = $request->sender_name;
        $shipment->receiver_name = $request->receiver_name;
        $shipment->origin = $request->origin;
        $shipment->destination = $request->destination;
        $shipment->weight = $request->weight;
        $shipment->status = $request->status;
        $shipment->save();

        return redirect()->route('shipments.index')->with('success', 'Shipment created successfully!');
    }

    // Edit shipment
    public function edit($id)
    {
        $shipment = Shipment::findOrFail($id);
        return view('shipments.edit', compact('shipment'));
    }

    // Update shipment
    public function update(Request $request, $id)
    {
        $shipment = Shipment::findOrFail($id);
        $shipment->update($request->all());

        return redirect()->route('shipments.index')->with('success', 'Shipment updated successfully!');
    }

    // Delete shipment
    public function destroy($id)
    {
        Shipment::destroy($id);
        return redirect()->route('shipments.index')->with('success', 'Shipment deleted successfully!');
    }
}
