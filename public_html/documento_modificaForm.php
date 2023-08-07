<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/documento.php');
$conexion = connect_db();
$documento = new Documento();
$documento->conectar_db($conexion);
$datos = $documento->consulta($codigo);

?>
<div class="container p-12">
<div class="row">
    <div class="card card-body">
        <form action="documento_modifica.php" method="post">
            <div class="form-group">
                <div class="col-md-4">Código:</div>
                <div class="col-md-4">
                    <input type="text" name="id" class="form-control" value="<?php echo $codigo;?>" readonly>
                </div>
                <div class="col-md-4">Nombre del Documento:</div>
                <div class="col-md-4">
                    <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombre'];?>" >
                </div>
                <div class="col-md-4">Número Actual:</div>
                <div class="col-md-4">
                    <input type="number" name="numero_actual" class="form-control" value="<?php echo $datos['numero_actual'];?>">
                </div>
                <div class="col-md-4">
                    <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                </div>
            </div>
        </form>
    </div>
</div>
</div>  
<?php include_once('footer.php') ?>
