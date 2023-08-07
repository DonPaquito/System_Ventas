<?php
session_start();
if (!isset($_SESSION['login_estado']) || $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/cliente.php');
$conexion = connect_db();
$cliente = new Cliente();
$cliente->conectar_db($conexion);
$datos_cliente = $cliente->lista_cliente();
if ($datos_cliente){
?>
<div class="container p-12">
    <div class="row">
        <div class="container p-4">
            <h4>Listado de Clientes...</h4>
            <a href="cliente_agregaForm.php" class="btn btn-info add-new">Nuevo</a>
        </div>  
        <div class="card card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>RUC</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($row=mysqli_fetch_array($datos_cliente)){
                    $id = $row['id'];
                    $nombre = $row['nombre'];
                    $ruc = $row['ruc'];
                    $direccion = $row['direccion_cliente'];
                    $telefono = $row['telefono_cliente'];
                ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $nombre; ?></td>
                        <td><?php echo $ruc; ?></td>
                        <td><?php echo $direccion; ?></td>
                        <td><?php echo $telefono; ?></td>
                        <td>
                            <a href="cliente_modificaForm.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>   
                            <a href="cliente_elimina.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>    
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
