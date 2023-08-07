<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso al sistema...</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        body {
            background-color: #000; /* Fondo negro */
            color: #fff; /* Texto en blanco */
        }

        /* Estilo para el encabezado con fondo oscuro */
        header {
            background-color: #222;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Estilo para el título */
        h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <h1>Ingreso al Sistema de Registro y Control de Ventas</h1>
        <h5>User:Admin---Password:Admin</h5>
    </header>

    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow" style="width: 350px;">
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <img src="img/login.png" width="88" class="rounded" alt="inicio sesion">
                </div>

                <form name="login" method="post" action="valida.php">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usua">
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="Password" name="pass">
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" name="envia_login" class="btn btn-primary">Ingresar</button>
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
