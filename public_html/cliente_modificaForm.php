<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/cliente.php');
$conexion = connect_db();
$cliente = new Cliente();
$cliente->conectar_db($conexion);
$datos = $cliente->consulta($codigo);

?>
<div class="container p-12">
<div class="row">
    <div class="card card-body">
        <form action="cliente_modifica.php" method="post">
            <div class="form-group">
                <div class="col-md-4">Código:</div>
                <div class="col-md-4">
                    <input type="text" name="id" class="form-control" value="<?php echo $codigo;?>" readonly>
                </div>
                <div class="col-md-4">Nombre:</div>
                <div class="col-md-4">
                    <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombre'];?>" >
                </div>
                <div class="col-md-4">RUC:</div>
                <div class="col-md-4">
                    <input type="text" name="ruc" class="form-control" value="<?php echo $datos['ruc'];?>">
                </div>
                <div class="col-md-4">Dirección:</div>
                <div class="col-md-4">
                    <input type="text" name="direccion" class="form-control" value="<?php echo $datos['direccion_cliente'];?>">
                </div>
                <div class="col-md-4">Teléfono:</div>
                <div class="col-md-4">
                    <input type="text" name="telefono" class="form-control" value="<?php echo $datos['telefono_cliente'];?>">
                </div>
                <div class="col-md-4">
                    <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</div>  
<?php include_once('footer.php') ?>
