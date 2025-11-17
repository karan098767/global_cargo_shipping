<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Cargo Shipping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Global Cargo Shipping</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('cargos.index') }}">Cargos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('shipments.index') }}">Shipments</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('ships.create') }}">Ships</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('crew.index') }}">Crew</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('clients.index') }}">Clients</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('ports.index') }}">Ports</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
