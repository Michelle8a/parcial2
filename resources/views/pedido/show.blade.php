<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @include('navbar')

    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Pedidos</h2>
            <a href="{{ route('pedido.create') }}" class="btn btn-primary">Nuevo pedido</a>
        </div>

        @if (session('ok'))
            <div class="alert alert-success">{{ session('ok') }}</div>
        @endif

        <table class="table table-bordered table-striped bg-white">
            <thead class="table-primary">
                <tr>
                    <th>Id</th><th>Fecha pedido</th><th>Fecha entrega</th>
                    <th>Observaciones</th><th>Cliente</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pedidos as $p)
                    <tr>
                        <td>{{ $p->Id_Pedido }}</td>
                        <td>{{ $p->FechaPedido }}</td>
                        <td>{{ $p->FechaEntrega }}</td>
                        <td>{{ $p->Observaciones }}</td>
                        <td>{{ $p->cliente->Nombre }} {{ $p->cliente->Apellido }}</td>
                        <td>
                            <a href="{{ route('detalle.index', $p->Id_Pedido) }}" class="btn btn-sm btn-info">Detalles</a>
                            <a href="{{ route('pedido.edit', $p->Id_Pedido) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('pedido.destroy', $p->Id_Pedido) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('¿Eliminar este pedido?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">No hay pedidos</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>