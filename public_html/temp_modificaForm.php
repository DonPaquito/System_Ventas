<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/temp.php');
$conexion = connect_db();
$temp = new Temp();
$temp->conectar_db($conexion);
$datos = $temp->consulta($codigo);

// Aquí debes obtener el nombre del producto correspondiente al id_producto desde la tabla producto
$nombre_producto = "Nombre del producto"; // Reemplaza esto con el valor correcto de la tabla producto
?>
<div class="container p-12">
<div class="row">
    <div class="card card-body">
        <form action="temp_modifica.php" method="post">
            <div class="form-group">
                <div class="col-md-4">Código:</div>
                <div class="col-md-4">
                    <input type="text" name="id" class="form-control" value="<?php echo $codigo;?>" readonly>
                </div>
                <div class="col-md-4">Cantidad:</div>
                <div class="col-md-4">
                    <input type="text" name="cantidad" class="form-control" value="<?php echo $datos['cantidad'];?>" >
                </div>
                <div class="col-md-4">Producto:</div>
                <div class="col-md-4">
                    <select class="form-control" name="id_producto">
                        <!-- Aquí debes cargar las opciones desde la tabla producto y seleccionar la opción actual -->
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</div>  
<?php include_once('footer.php') ?>
