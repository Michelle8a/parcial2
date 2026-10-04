<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @include('navbar')

    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Artículos</h2>
            <a href="{{ route('articulo.create') }}" class="btn btn-primary">Nuevo artículo</a>
        </div>

        @if (session('ok'))
            <div class="alert alert-success">{{ session('ok') }}</div>
        @endif

        <table class="table table-bordered table-striped bg-white">
            <thead class="table-primary">
                <tr>
                    <th>Id</th><th>Nombre</th><th>Descripción</th>
                    <th>Inventario</th><th>Precio</th><th>En pedidos</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articulos as $a)
                    @php
                        $enPedidos = $usos[$a->Id_Articulo] ?? 0;
                        $mensaje = $enPedidos > 0
                            ? "¿Eliminar este artículo? Se quitará también de {$enPedidos} pedido(s)."
                            : "¿Eliminar este artículo?";
                    @endphp
                    <tr>
                        <td>{{ $a->Id_Articulo }}</td>
                        <td>{{ $a->Nombre }}</td>
                        <td>{{ $a->Descripcion }}</td>
                        <td>{{ $a->CantInventario }}</td>
                        <td>${{ number_format($a->Precio, 2) }}</td>
                        <td>{{ $enPedidos }}</td>
                        <td>
                            <a href="{{ route('articulo.edit', $a->Id_Articulo) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('articulo.destroy', $a->Id_Articulo) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm(@js($mensaje))">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">No hay artículos</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>