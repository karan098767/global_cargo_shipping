@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h1 class="mb-4">Global Cargo Shipping Dashboard</h1>

    {{-- Shipments --}}
    <h2>Shipments</h2>
    <table class="table table-bordered table-striped mb-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Cargo</th>
                <th>Ship</th>
                <th>Origin Port</th>
                <th>Destination Port</th>
                <th>Departure</th>
                <th>Arrival Estimate</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($shipments as $shipment)
            <tr>
                <td>{{ $shipment->id }}</td>
                <td>{{ $shipment->cargo->cargo_name ?? 'N/A' }}</td>
                <td>{{ $shipment->ship->name ?? 'N/A' }}</td>
                <td>{{ $shipment->originPort->name ?? 'N/A' }}</td>
                <td>{{ $shipment->destinationPort->name ?? 'N/A' }}</td>
                <td>{{ $shipment->departure_date ?? '-' }}</td>
                <td>{{ $shipment->arrival_estimate ?? '-' }}</td>
                <td>
                    <span class="badge 
                        @if($shipment->status == 'pending') bg-warning
                        @elseif($shipment->status == 'in_transit') bg-info
                        @elseif($shipment->status == 'delivered') bg-success
                        @elseif($shipment->status == 'delayed') bg-danger
                        @endif">
                        {{ ucfirst($shipment->status) }}
                    </span>
                </td>
            </tr>
            @empty
            <tr><td colspan="8" class="text-center">No shipments found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Ships --}}
    <h2>Ships</h2>
    <table class="table table-bordered table-striped mb-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Registration</th>
                <th>Capacity (Tonnes)</th>
                <th>Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ships as $ship)
            <tr>
                <td>{{ $ship->id }}</td>
                <td>{{ $ship->name }}</td>
                <td>{{ $ship->registration_number }}</td>
                <td>{{ $ship->capacity_in_tonnes }}</td>
                <td>{{ ucfirst($ship->type) }}</td>
                <td>
                    <span class="badge 
                        @if($ship->status == 'active') bg-success
                        @elseif($ship->status == 'under maintenance') bg-warning
                        @elseif($ship->status == 'decommissioned') bg-danger
                        @endif">
                        {{ ucfirst($ship->status) }}
                    </span>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center">No ships found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Cargos --}}
    <h2>Cargos</h2>
    <table class="table table-bordered table-striped mb-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Tracking Number</th>
                <th>Weight</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cargos as $cargo)
            <tr>
                <td>{{ $cargo->id }}</td>
                <td>{{ $cargo->cargo_name }}</td>
                <td>{{ $cargo->tracking_number }}</td>
                <td>{{ $cargo->weight }}</td>
                <td>{{ $cargo->origin_port }}</td>
                <td>{{ $cargo->destination_port }}</td>
                <td>
                    <span class="badge 
                        @if($cargo->status == 'Pending') bg-warning
                        @elseif($cargo->status == 'In Transit') bg-info
                        @elseif($cargo->status == 'Delivered') bg-success
                        @endif">
                        {{ $cargo->status }}
                    </span>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center">No cargos found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Ports --}}
    <h2>Ports</h2>
    <table class="table table-bordered table-striped mb-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Country</th>
                <th>Type</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ports as $port)
            <tr>
                <td>{{ $port->id }}</td>
                <td>{{ $port->name }}</td>
                <td>{{ $port->country }}</td>
                <td>{{ $port->port_type }}</td>
                <td>
                    <span class="badge {{ $port->is_active ? 'bg-success' : 'bg-danger' }}">
                        {{ $port->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="text-center">No ports found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Crew --}}
    <h2>Crew Members</h2>
    <table class="table table-bordered table-striped mb-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Ship</th>
                <th>Role</th>
                <th>Phone</th>
                <th>Nationality</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @forelse($crew as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->first_name }} {{ $member->last_name }}</td>
                <td>{{ $member->ship->name ?? 'N/A' }}</td>
                <td>{{ $member->role }}</td>
                <td>{{ $member->phone_number }}</td>
                <td>{{ $member->nationality }}</td>
                <td>
                    <span class="badge {{ $member->is_active ? 'bg-success' : 'bg-danger' }}">
                        {{ $member->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center">No crew members found.</td></tr>
            @endforelse
        </tbody>
    </table>

    {{-- Clients --}}
    <h2>Clients</h2>
    <table class="table table-bordered table-striped mb-4">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->first_name }} {{ $client->last_name }}</td>
                <td>{{ $client->email_address }}</td>
                <td>{{ $client->phone_number }}</td>
                <td>{{ $client->address }}</td>
                <td>
                    <span class="badge {{ $client->is_active ? 'bg-success' : 'bg-danger' }}">
                        {{ $client->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center">No clients found.</td></tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
