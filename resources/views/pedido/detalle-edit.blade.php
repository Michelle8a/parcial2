<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar detalle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @include('navbar')

    <div class="container my-4" style="max-width: 600px;">
        <h2 class="mb-3">Editar detalle del pedido #{{ $pedido->Id_Pedido }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('detalle.update', [$pedido->Id_Pedido, $detalle->Id_Articulo]) }}" method="POST" class="card card-body shadow-sm">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Artículo</label>
                <input type="text" class="form-control" value="{{ $detalle->Nombre }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Cantidad</label>
                <input type="number" name="Cantidad" min="1" class="form-control"
                       value="{{ old('Cantidad', $detalle->Cantidad) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Descuento</label>
                <input type="number" name="Descuento" min="0" step="0.01" class="form-control"
                       value="{{ old('Descuento', $detalle->Descuento) }}">
            </div>
            <div class="d-flex gap-2">
                <button class="btn btn-primary">Actualizar</button>
                <a href="{{ route('detalle.index', $pedido->Id_Pedido) }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>