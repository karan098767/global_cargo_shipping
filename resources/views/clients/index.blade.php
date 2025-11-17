@extends('layouts.app')

@section('content')
<h2>Clients</h2>
<table class="table table-striped table-bordered">
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
            <td>{{ $client->is_active ? 'Yes' : 'No' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">No clients found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
