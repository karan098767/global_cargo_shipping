@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Port</h2>

    <form action="{{ route('ports.update', $port->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" value="{{ $port->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Country:</label>
            <input type="text" name="country" value="{{ $port->country }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Code:</label>
            <input type="text" name="code" value="{{ $port->code }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Location:</label>
            <input type="text" name="location" value="{{ $port->location }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update Port</button>
        <a href="{{ route('ports.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
