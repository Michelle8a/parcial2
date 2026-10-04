<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipo 5 Proyecto 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-light">

    @include('navbar')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-9">
                <div class="card shadow">

                    <div class="card-header bg-primary text-white text-center py-4">
                        <h1 class="h3 mb-2">
                            Escuela Especializada en Ingeniería
                        </h1>
                        <h2 class="h5 mb-0">
                            ITCA - FEPADE
                        </h2>
                    </div>

                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">
                            Datos del Proyecto
                        </h3>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th class="table-primary" width="30%">Carrera</th>
                                        <td>Ingeniería en Desarrollo de Software</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary">Materia</th>
                                        <td>Desarrollo Web Usando Software Libre</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary">Catedrático</th>
                                        <td>Ing. Jefferson Pineda</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary">Trabajo presentado por</th>
                                        <td>
                                            <ul class="mb-0">
                                                @foreach ($integrantes as $integrante)
                                                    <li>
                                                        {{ $integrante['nombre'] }} {{ $integrante['apellido'] }}
                                                        — Carnet: {{ $integrante['carnet'] }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary">Grupo</th>
                                        <td>{{ $grupo }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary">Ciclo Actual</th>
                                        <td>Ciclo 02 - 2026</td>
                                    </tr>
                                    <tr>
                                        <th class="table-primary">Parcial 2</th>
                                        <td class="fw-bold">Equipo 5 Proyecto 1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>