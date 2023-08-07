<?php
session_start();
if (!isset($_SESSION['login_estado']) || $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/documento.php');
$conexion = connect_db();
$documento = new Documento();
$documento->conectar_db($conexion);
$datos_documento = $documento->listadocs();
if ($datos_documento){
?>
<div class="container p-12">
    <div class="row">
        <div class="container p-4">
            <h4>Listado de Documentos...</h4>
            <a href="documento_agregaForm.php" class="btn btn-info add-new">Nuevo</a>
        </div>  
        <div class="card card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Número Actual</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($row=mysqli_fetch_array($datos_documento)){
                    $id = $row['id'];
                    $nombre = $row['nombre'];
                    $numero_actual = $row['numero_actual'];
                ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $numero_actual; ?></td>
                        <td>
                            <a href="documento_modificaForm.php?id=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>   
                            <a href="documento_elimina.php?id=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>    
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
<?php
}
?>
