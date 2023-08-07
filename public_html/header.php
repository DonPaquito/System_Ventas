<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Empresa SA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownArchivos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Archivos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownArchivos">
                        <li><a class="dropdown-item" href="producto_lista.php">Productos</a></li>
                        <li><a class="dropdown-item" href="cliente_lista.php">Clientes</a></li>
                        <li><a class="dropdown-item" href="proveedor_lista.php">Proveedor</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="documento_lista.php">Documentos</a></li>
                        <li><a class="dropdown-item" href="linea_lista.php">Lineas</a></li>
                        <li><a class="dropdown-item" href="empleado_lista.php">Empleados</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="logout.php">Salir</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownProcesos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Procesos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownProcesos">
                        <li><a class="dropdown-item" href="vender_productos.php">Vender Productos</a></li>
                        <li><a class="dropdown-item" href="comprar_productos.php">Comprar Productos</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownConsultas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Consultas
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownProcesos">
                        <li><a class="dropdown-item" href="productos_consultar.php">Consultar productos</a></li>
                        <li><a class="dropdown-item" href="clientes_consultar.php">Consultar clientes</a></li>
                        <li><a class="dropdown-item" href="lineas_consultar.php">Consultar lineas</a></li>
                        <li><a class="dropdown-item" href="ventas_consultar.php">Consultar Ventas</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

  </body>
</html>
