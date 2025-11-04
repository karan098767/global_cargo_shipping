@extends('layouts.app')

@section('content')
<h1>👨‍✈️ Crew Members</h1>
<a href="{{ route('crew.create') }}">Add Crew Member</a>

<table border="1" cellpadding="8">
    <tr>
        <th>Name</th>
        <th>Role</th>
        <th>Ship</th>
        <th>Nationality</th>
        <th>Actions</th>
    </tr>

    @foreach($crew as $member)
    <tr>
        <td>{{ $member->first_name }} {{ $member->last_name }}</td>
        <td>{{ $member->role }}</td>
        <td>{{ $member->ship ? $member->ship->name : 'Unassigned' }}</td>
        <td>{{ $member->nationality ?? 'N/A' }}</td>
        <td>
            <a href="{{ route('crew.edit', $member->id) }}">Edit</a>
            <form action="{{ route('crew.destroy', $member->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Deactivate</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
