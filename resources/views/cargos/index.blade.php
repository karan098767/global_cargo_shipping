@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Cargos</h2>
    <a href="{{ route('cargos.create') }}" class="btn btn-primary">Add Cargo</a>
</div>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Cargo Name</th>
            <th>Tracking #</th>
            <th>Weight (kg)</th>
            <th>Origin Port</th>
            <th>Destination Port</th>
            <th>Status</th>
            <th>Active</th>
            <th>Created At</th>
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
                @php
                    $statusClass = match($cargo->status) {
                        'Pending' => 'badge bg-warning',
                        'In Transit' => 'badge bg-info',
                        'Delivered' => 'badge bg-success',
                        default => 'badge bg-secondary'
                    };
                @endphp
                <span class="{{ $statusClass }}">{{ $cargo->status }}</span>
            </td>
            <td>{{ $cargo->is_active ? 'Yes' : 'No' }}</td>
            <td>{{ $cargo->created_at?->format('d M Y') }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="9" class="text-center">No cargos found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
