@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Cargo</h1>

    <form action="{{ route('cargos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Cargo Name</label>
            <input type="text" name="cargo_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tracking Number</label>
            <input type="text" name="tracking_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Weight (kg)</label>
            <input type="number" step="0.01" name="weight" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Origin Port</label>
            <input type="text" name="origin_port" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Destination Port</label>
            <input type="text" name="destination_port" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option>Pending</option>
                <option>In Transit</option>
                <option>Delivered</option>
            </select>
        </div>

        <button class="btn btn-success">Save Cargo</button>
        <a href="{{ route('cargos.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
