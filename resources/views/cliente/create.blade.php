<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @include('navbar')

    <div class="container my-4" style="max-width: 600px;">
        <h2 class="mb-3">Nuevo cliente</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cliente.store') }}" method="POST" class="card card-body shadow-sm">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="Nombre" maxlength="50" class="form-control" value="{{ old('Nombre') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" name="Apellido" maxlength="50" class="form-control" value="{{ old('Apellido') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento</label>
                <input type="date" name="Fecha_Nac" max="{{ date('Y-m-d') }}" class="form-control" value="{{ old('Fecha_Nac') }}" required>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-primary">Guardar</button>
                <a href="{{ route('cliente.show') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>