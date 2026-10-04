<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @include('navbar')

    <div class="container my-4" style="max-width: 600px;">
        <h2 class="mb-3">Nuevo pedido</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pedido.store') }}" method="POST" class="card card-body shadow-sm">
            @csrf
            <div class="mb-3">
                <label class="form-label">Fecha de pedido</label>
                <input type="datetime-local" name="FechaPedido" class="form-control" value="{{ old('FechaPedido') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de entrega</label>
                <input type="datetime-local" name="FechaEntrega" class="form-control" value="{{ old('FechaEntrega') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Observaciones</label>
                <input type="text" name="Observaciones" maxlength="150" class="form-control" value="{{ old('Observaciones') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Cliente</label>
                <select name="Id_Cliente" class="form-select" required>
                    <option value="">-- Seleccione un cliente --</option>
                    @foreach ($clientes as $c)
                        <option value="{{ $c->Id_Cliente }}" {{ old('Id_Cliente') == $c->Id_Cliente ? 'selected' : '' }}>
                            {{ $c->Nombre }} {{ $c->Apellido }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-primary">Guardar</button>
                <a href="{{ route('pedido.show') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>