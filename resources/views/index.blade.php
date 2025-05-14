<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsivo -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/app.css" rel="stylesheet">
    @vite(['resources/js/app.js'])
</head>

<body>
    <div class="container mt-5">

        <h1>Registro de Clientes</h1>

        <form method="POST" action="{{ route('cliente.crear') }}">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" name="apellido" id="apellido" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cedula" class="form-label">Cédula:</label>
                <input type="text" name="cedula" id="cedula" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="departamento_id" class="form-label">Departamento:</label>
                <select name="departamento_id" id="departamento_id" class="form-select" required>
                    <option value="">Cargando departamentos...</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="municipio_id" class="form-label">Municipio:</label>
                <select name="municipio_id" id="municipio_id" class="form-select" required>
                    <option value="">Seleccione un municipio</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="celular" class="form-label">Celular:</label>
                <input type="text" name="celular" id="celular" class="form-control" required pattern="[0-9]+">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="terminos_condiciones" id="terminos_condiciones" class="form-check-input"
                    required>
                <label class="form-check-label" for="terminos_condiciones">“Autorizo el tratamiento de mis datos de
                    acuerdo con la
                    finalidad establecida en la política de protección de datos personales”. Haga clic
                    aquí</label>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</body>

</html>
