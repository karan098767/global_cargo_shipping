<!DOCTYPE html>
<html>
<head>
    <title>Add New Shipment</title>
</head>
<body>
    <h1>➕ Add a New Shipment</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('shipments.store') }}" method="POST">
        @csrf
        <label>Tracking Number:</label><br>
        <input type="text" name="tracking_number" required><br><br>

        <label>Sender Name:</label><br>
        <input type="text" name="sender_name" required><br><br>

        <label>Receiver Name:</label><br>
        <input type="text" name="receiver_name" required><br><br>

        <label>Origin:</label><br>
        <input type="text" name="origin" required><br><br>

        <label>Destination:</label><br>
        <input type="text" name="destination" required><br><br>





        <label>Weight (kg):</label><br>
        <input type="number" name="weight" step="0.1" required><br><br>

        <label>Status:</label><br>
        <select name="status" required>
            <option value="Pending">Pending</option>
            <option value="In Transit">In Transit</option>
            <option value="Delivered">Delivered</option>
        </select><br><br>

        <button type="submit">Save Shipment</button>
    </form>

    <br>
    <a href="{{ route('shipments.index') }}">⬅ Back to Shipments</a>
</body>
</html>
                                                                                                                                                                                                                                                                        