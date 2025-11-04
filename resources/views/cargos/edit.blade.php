@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Cargo</h1>

    <form action="{{ route('cargos.update', $cargo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Cargo Name</label>
            <input type="text" name="cargo_name" class="form-control" value="{{ $cargo->cargo_name }}" required>
        </div>

        <div class="mb-3">
            <label>Tracking Number</label>
            <input type="text" name="tracking_number" class="form-control" value="{{ $cargo->tracking_number }}" required>
        </div>

        <div class="mb-3">
            <label>Weight (kg)</label>
            <input type="number" step="0.01" name="weight" class="form-control" value="{{ $cargo->weight }}" required>
        </div>

        <div class="mb-3">
            <label>Origin Port</label>
            <input type="text" name="origin_port" class="form-control" value="{{ $cargo->origin_port }}" required>
        </div>

        <div class="mb-3">
            <label>Destination Port</label>
            <input type="text" name="destination_port" class="form-control" value="{{ $cargo->destination_port }}" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option {{ $cargo->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option {{ $cargo->status == 'In Transit' ? 'selected' : '' }}>In Transit</option>
                <option {{ $cargo->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
            </select>
        </div>

        <button class="btn btn-success">Update Cargo</button>
        <a href="{{ route('cargos.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
