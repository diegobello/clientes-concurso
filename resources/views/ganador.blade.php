<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ganador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5 text-center">
        <h1>¡Felicidades!</h1>
        @if ($mensaje)
            <div class="alert alert-warning text-center mt-4">
                {{ $mensaje }}
            </div>
        @elseif ($ganador)
            <div class="card mt-4">
                <div class="card-body">
                    <h3 class="card-title">{{ $ganador->cli_nombre }} {{ $ganador->cli_apellido }}</h3>
                    <p class="card-text">Cédula: {{ $ganador->cli_cedula }}</p>
                    <p class="card-text">Departamento: {{ $ganador->departamento->dep_nombre }}</p>
                    <p class="card-text">Municipio: {{ $ganador->municipio->mun_nombre }}</p>
                </div>
            </div>
        @else
            <p class="mt-4">No hay clientes registrados aún.</p>
        @endif

        <a href="{{ route('clientes.exportar') }}" class="btn btn-success mt-4">
            Descargar Excel de registros
        </a>
        <a href="{{ route('cliente.index') }}" class="btn btn-primary mt-4">Registrar otro cliente</a>
    </div>
</body>

</html>
