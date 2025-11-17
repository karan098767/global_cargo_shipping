@extends('layouts.app')

@section('content')
<h2>Crew Members</h2>
<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Ship</th>
            <th>Name</th>
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
            <td>{{ $member->ship->name ?? '-' }}</td>
            <td>{{ $member->first_name }} {{ $member->last_name }}</td>
            <td>{{ $member->role }}</td>
            <td>{{ $member->phone_number }}</td>
            <td>{{ $member->nationality }}</td>
            <td>{{ $member->is_active ? 'Yes' : 'No' }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">No crew members found</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
