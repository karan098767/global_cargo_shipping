@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cargo List</h1>

    <a href="{{ route('cargos.create') }}" class="btn btn-primary mb-3">+ Add New Cargo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cargo Name</th>
                <th>Tracking Number</th>
                <th>Weight (kg)</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cargos as $cargo)
            <tr>
                <td>{{ $cargo->id }}</td>
                <td>{{ $cargo->cargo_name }}</td>
                <td>{{ $cargo->tracking_number }}</td>
                <td>{{ $cargo->weight }}</td>
                <td>{{ $cargo->origin_port }}</td>
                <td>{{ $cargo->destination_port }}</td>
                <td>{{ $cargo->status }}</td>
                <td>
                    <a href="{{ route('cargos.edit', $cargo) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('cargos.destroy', $cargo) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deactivate this cargo?')">Deactivate</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
