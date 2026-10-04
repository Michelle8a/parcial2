<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Equipo 5 Proyecto 1</a>
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pedido.show') }}">PEDIDO</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">CLIENTE</a></li>
                <li class="nav-item"><a class="nav-link" href="#">ARTICULO</a></li>
            </ul>
        </div>
    </div>
</nav>