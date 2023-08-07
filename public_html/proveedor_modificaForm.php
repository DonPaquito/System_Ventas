<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/proveedor.php');
include_once('includes/acceso.php');
include ('clases/linea.php');
$conexion = connect_db();
$linea=new Linea();
$linea->conectar_db($conexion);
$conexion = connect_db();
$proveedor = new Proveedor();
$proveedor->conectar_db($conexion);
$datos = $proveedor->consulta($codigo);
?>
<div class="container p-12">
<div class="row">
    <div class="card card-body">
        <form action="proveedor_modifica.php" method="post">
            <div class="form-group">
                <div class="col-md-4">Código:</div>
                <div class="col-md-4">
                    <input type="text" name="id" class="form-control" value="<?php echo $codigo;?>" readonly>
                </div>
                <div class="col-md-4">Nombre:</div>
                <div class="col-md-4">
                    <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombre'];?>" >
                </div>
                <div class="col-md-4">Línea:</div>
                <div class="col-md-4">
                    <select class="form-control" name="nombre_linea">
                    <?php                                 
                        $datos_linea=$linea->listaline();
                        while ($row=mysqli_fetch_array($datos_linea)){
                            $nombre = $row['nombre'];
                            ?>
                            <option value="<?php echo $nombre;?>"><?php echo $nombre;?></option>
                            <?php
                        }
                            ?> 
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

