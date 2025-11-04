@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Add New Port</h2>

    <form action="{{ route('ports.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Country:</label>
            <input type="text" name="country" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Code:</label>
            <input type="text" name="code" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Location:</label>
            <input type="text" name="location" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save Port</button>
        <a href="{{ route('ports.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
