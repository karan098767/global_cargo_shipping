@extends('layouts.app')

@section('content')
<h2>Ships</h2>
<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Registration #</th>
            <th>Capacity (tonnes)</th>
            <th>Type</th>
            <th>Status</th>
            <th>Active</th>
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
                @php
                    $statusClass = match($ship->status) {
                        'active' => 'badge bg-success',
                        'under maintenance' => 'badge bg-warning',
                        'decommissioned' => 'badge bg-danger',
                        default => 'badge bg-secondary'
                    };
                @endphp
                <span class="{{ $statusClass }}">{{ $ship->status }}</span>
            </td>
            <td>{{ $ship->is_active ? 'Yes' : 'No' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">No ships found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
