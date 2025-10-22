<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shipments Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; padding: 20px; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #007bff; color: white; }
        tr:nth-child(even) { background: #f2f2f2; }
        .status { text-transform: capitalize; }
    </style>
</head>
<body>
    <h1>🚢 Shipments Management Dashboard</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(count($shipments) > 0)
        <table>
            <tr>
                <th>ID</th>
                <th>Tracking #</th>
                <th>Sender</th>
                <th>Receiver</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Weight (kg)</th>
                <th>Status</th>
            </tr>
            @foreach ($shipments as $shipment)
            <tr>
                <td>{{ $shipment->id }}</td>
                <td>{{ $shipment->tracking_number }}</td>
                <td>{{ $shipment->sender_name }}</td>
                <td>{{ $shipment->receiver_name }}</td>
                <td>{{ $shipment->origin }}</td>
                <td>{{ $shipment->destination }}</td>
                <td>{{ $shipment->weight }}</td>
                <td class="status">{{ $shipment->status }}</td>
            </tr>
            @endforeach
        </table>
    @else
        <p>No shipments found.</p>
    @endif
</body>
</html>
