@extends('layouts.app')

@section('content')
<h2>Ports</h2>
<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Country</th>
            <th>Type</th>
            <th>Manager</th>
            <th>Contact</th>
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
            <td>{{ $port->port_manager }}</td>
            <td>{{ $port->port_contact_info }}</td>
            <td>{{ $port->is_active ? 'Yes' : 'No' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">No ports found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
