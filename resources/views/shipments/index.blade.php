@extends('layouts.app')

@section('content')
<h2>Shipments</h2>

<table class="table table-striped table-bordered">
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
            <td>{{ $shipment->cargo->cargo_name ?? '-' }}</td>
            <td>{{ $shipment->ship->name ?? '-' }}</td>
            <td>{{ $shipment->originPort->name ?? '-' }}</td>
            <td>{{ $shipment->destinationPort->name ?? '-' }}</td>
            <td>{{ $shipment->departure_date }}</td>
            <td>{{ $shipment->arrival_estimate }}</td>
            <td>
                @php
                    $statusClass = match($shipment->status) {
                        'pending' => 'badge bg-warning',
                        'in_transit' => 'badge bg-info',
                        'delivered' => 'badge bg-success',
                        'delayed' => 'badge bg-danger',
                        default => 'badge bg-secondary'
                    };
                @endphp
                <span class="{{ $statusClass }}">{{ ucfirst($shipment->status) }}</span>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="8" class="text-center">No shipments found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
