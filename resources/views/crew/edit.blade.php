@extends('layouts.app')

@section('content')
<h1>✏️ Edit Crew Member</h1>

<a href="{{ route('crew.index') }}">← Back to Crew List</a>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('crew.update', $crew->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>First Name:</label><br>
    <input type="text" name="first_name" value="{{ old('first_name', $crew->first_name) }}" required><br><br>

    <label>Last Name:</label><br>
    <input type="text" name="last_name" value="{{ old('last_name', $crew->last_name) }}" required><br><br>

    <label>Role:</label><br>
    <select name="role" required>
        @php
        $roles = ['Captain','Chief Officer','Able Seaman','Ordinary Seaman','Engine Cadet','Radio Officer','Chief Cook','Steward','Deckhand'];
        @endphp
        @foreach ($roles as $role)
            <option value="{{ $role }}" {{ old('role', $crew->role) == $role ? 'selected' : '' }}>
                {{ $role }}
            </option>
        @endforeach
    </select><br><br>

    <label>Phone Number:</label><br>
    <input type="text" name="phone_number" value="{{ old('phone_number', $crew->phone_number) }}" required><br><br>

    <label>Nationality:</label><br>
    <input type="text" name="nationality" value="{{ old('nationality', $crew->nationality) }}"><br><br>

    <label>Assigned Ship:</label><br>
    <select name="ship_id">
        <option value="">-- None --</option>
        @foreach ($ships as $ship)
            <option value="{{ $ship->id }}" {{ old('ship_id', $crew->ship_id) == $ship->id ? 'selected' : '' }}>
                {{ $ship->name }}
            </option>
        @endforeach
    </select><br><br>

    <button type="submit">Update Crew Member</button>
</form>
@endsection
