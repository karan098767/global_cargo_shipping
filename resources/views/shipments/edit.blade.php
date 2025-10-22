<!DOCTYPE html>
<html>
<head>
    <title>Edit Ship</title>
</head>
<body>
    <h1>✏️ Edit Ship</h1>

    <form action="{{ route('ships.update', $ship->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ $ship->name }}" required><br><br>

        <label>Registration Number:</label>
        <input type="text" name="registration_number" value="{{ $ship->registration_number }}" required><br><br>

        <label>Type:</label>
        <input type="text" name="type" value="{{ $ship->type }}"><br><br>

        <label>Capacity:</label>
        <input type="number" name="capacity" value="{{ $ship->capacity }}"><br><br>

        <button type="submit">Update Ship</button>
    </form>
</body>
</html>
