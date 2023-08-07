<?php 
session_start();
if (!isset($_SESSION['login_estado']) || $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}include_once('header.php');
?>
<div class="container p-12">
<div class="row">
<div class="col-md-4">
                <div class="card card-body">
                    <form action="empleado_agrega.php" method="post">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
                        </div>
                        <div class="form-group">
                            <input type="text" name="direccion" class="form-control" placeholder="Dirección">
                        </div>
                        <div class="form-group">
                            <input type="text" name="usuario" class="form-control" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <input type="password" name="contrasena" class="form-control" placeholder="Contraseña">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include_once('footer.php') ?>
