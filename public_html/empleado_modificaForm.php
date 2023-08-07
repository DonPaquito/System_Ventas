<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/empleado.php');
$conexion = connect_db();
$empleado = new Empleado();
$empleado->conectar_db($conexion);
$datos = $empleado->consulta($codigo);
?>
<div class="container p-12">
<div class="row">
    <div class="card card-body">
        <form action="empleado_modifica.php" method="post">
            <div class="form-group">
                <div class="col-md-4">Código:</div>
                <div class="col-md-4">
                    <input type="text" name="id" class="form-control" value="<?php echo $codigo;?>" readonly>
                </div>
                <div class="col-md-4">Nombre:</div>
                <div class="col-md-4">
                    <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombre'];?>" >
                </div>
                <div class="col-md-4">Teléfono:</div>
                <div class="col-md-4">
                    <input type="text" name="telefono" class="form-control" value="<?php echo $datos['telefono'];?>">
                </div>
                <div class="col-md-4">Dirección:</div>
                <div class="col-md-4">
                    <input type="text" name="direccion" class="form-control" value="<?php echo $datos['direccion'];?>">
                </div>
                <div class="col-md-4">Usuario:</div>
                <div class="col-md-4">
                    <input type="text" name="usuario" class="form-control" value="<?php echo $datos['usuario'];?>">
                </div>
                <div class="col-md-4">Contraseña:</div>
                <div class="col-md-4">
                    <input type="password" name="contrasena" class="form-control" value="<?php echo $datos['contraseña'];?>">
                </div>
                <div class="col-md-4">
                    <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</div>  
<?php include_once('footer.php') ?>
