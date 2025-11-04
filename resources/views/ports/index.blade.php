@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Ports List</h2>
    <a href="{{ route('ports.create') }}" class="btn btn-primary mb-3">Add New Port</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Country</th>
                <th>Code</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ports as $port)
                <tr>
                    <td>{{ $port->id }}</td>
                    <td>{{ $port->name }}</td>
                    <td>{{ $port->country }}</td>
                    <td>{{ $port->code }}</td>
                    <td>{{ $port->location ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('ports.edit', $port->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('ports.destroy', $port->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Deactivate</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">No ports found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
