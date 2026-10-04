<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @include('navbar')

    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Detalles del pedido #{{ $pedido->Id_Pedido }}</h2>
            <a href="{{ route('pedido.show') }}" class="btn btn-secondary">Volver a pedidos</a>
        </div>

        @if (session('ok'))
            <div class="alert alert-success">{{ session('ok') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('detalle.store', $pedido->Id_Pedido) }}" method="POST" class="card card-body shadow-sm mb-4">
            @csrf
            <h5 class="mb-3">Agregar artículo</h5>
            <div class="row g-3">
                <div class="col-md-5">
                    <label class="form-label">Artículo</label>
                    <select name="Id_Articulo" class="form-select" required>
                        <option value="">-- Seleccione un artículo --</option>
                        @foreach ($articulos as $a)
                            <option value="{{ $a->Id_Articulo }}" {{ old('Id_Articulo') == $a->Id_Articulo ? 'selected' : '' }}>
                                {{ $a->Nombre }} (${{ number_format($a->Precio, 2) }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Cantidad</label>
                    <input type="number" name="Cantidad" min="1" class="form-control" value="{{ old('Cantidad', 1) }}" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Descuento</label>
                    <input type="number" name="Descuento" min="0" step="0.01" class="form-control" value="{{ old('Descuento', 0) }}">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button class="btn btn-primary w-100">Agregar</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered table-striped bg-white">
            <thead class="table-primary">
                <tr><th>Artículo</th><th>Precio</th><th>Cantidad</th><th>Descuento</th><th>Acciones</th></tr>
            </thead>
            <tbody>
                @forelse ($detalles as $d)
                    <tr>
                        <td>{{ $d->Nombre }}</td>
                        <td>${{ number_format($d->Precio, 2) }}</td>
                        <td>{{ $d->Cantidad }}</td>
                        <td>{{ $d->Descuento }}</td>
                        <td>
                            <a href="{{ route('detalle.edit', [$pedido->Id_Pedido, $d->Id_Articulo]) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('detalle.destroy', [$pedido->Id_Pedido, $d->Id_Articulo]) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('¿Quitar este artículo del pedido?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">Este pedido no tiene artículos</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>