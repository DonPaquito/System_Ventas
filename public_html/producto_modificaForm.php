<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/producto.php');
$conexion = connect_db();
$oproducto = new Producto();
$oproducto->conectar_db($conexion);
$datos=$oproducto->consulta($codigo);
?>
<div class="container p-12">
    <div class="row">
        <div class="card card-body">
            <form action="producto_modifica.php" method="post">
                <div class="form-group">
                    <div class="col-md-4">Codigo:</div>
                    <div class="col-md-4">
                        <input type="text" name="id" class="form-control" value="<?php echo $codigo;?>" readonly>
                    </div>
                    <div class="col-md-4">Descripcion:</div>
                    <div class="col-md-4">
                        <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombre_producto'];?>" >
                    </div>
                    <div class="col-md-4">Unidad medida:</div>
                    <div class="col-md-4">
                        <input type="text" name="unidad" class="form-control" value="<?php echo $datos['unidad_medida'];?>">
                    </div>
                    <div class="col-md-4">Stock:</div>
                    <div class="col-md-4">
                        <input type="text" name="cantidad" class="form-control" value="<?php echo $datos['stock'];?>">
                    </div>
                    <div class="col-md-4">Precio Unitario:</div>
                    <div class="col-md-4">
                        <input type="text" name="precio" class="form-control" value="<?php echo $datos['precio_unidad'];?>">
                    </div>
                    <div class="col-md-4">Costo Unitario:</div>
                    <div class="col-md-4">
                        <input type="text" name="costo" class="form-control" value="<?php echo $datos['costo_unidad'];?>">
                    </div>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>  
<?php include_once('footer.php') ?>
