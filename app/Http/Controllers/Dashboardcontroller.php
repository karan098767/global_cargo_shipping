<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Models\Ship;
use App\Models\Crew;
use App\Models\Client;
use App\Models\Port;
use App\Models\Shipment;

class DashboardController extends Controller
{
    public function index()
    {
        $cargos = Cargo::all();
        $ships = Ship::all();
        $crew = Crew::with('ship')->get();
        $clients = Client::all();
        $ports = Port::all();
        $shipments = Shipment::with(['cargo', 'ship', 'originPort', 'destinationPort'])->get();

        return view('dashboard.index', compact('cargos', 'ships', 'crew', 'clients', 'ports', 'shipments'));
    }
}
