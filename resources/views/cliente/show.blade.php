<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @include('navbar')

    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Clientes</h2>
            <a href="{{ route('cliente.create') }}" class="btn btn-primary">Nuevo cliente</a>
        </div>

        @if (session('ok'))
            <div class="alert alert-success">{{ session('ok') }}</div>
        @endif

        <table class="table table-bordered table-striped bg-white">
            <thead class="table-primary">
                <tr>
                    <th>Id</th><th>Nombre</th><th>Apellido</th>
                    <th>Fecha de nacimiento</th><th>Pedidos</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clientes as $c)
                    @php
                        $mensaje = $c->pedidos_count > 0
                            ? "¿Eliminar este cliente? Se eliminarán también sus {$c->pedidos_count} pedido(s)."
                            : "¿Eliminar este cliente?";
                    @endphp
                    <tr>
                        <td>{{ $c->Id_Cliente }}</td>
                        <td>{{ $c->Nombre }}</td>
                        <td>{{ $c->Apellido }}</td>
                        <td>{{ $c->Fecha_Nac->format('d/m/Y') }}</td>
                        <td>{{ $c->pedidos_count }}</td>
                        <td>
                            <a href="{{ route('cliente.edit', $c->Id_Cliente) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('cliente.destroy', $c->Id_Cliente) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm(@js($mensaje))">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">No hay clientes</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>