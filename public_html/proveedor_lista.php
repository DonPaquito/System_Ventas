<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] = 1){
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/proveedor.php');
include_once('clases/linea.php');
$conexion = connect_db();
$linea=new Linea();
$proveedor = new Proveedor();
$proveedor->conectar_db($conexion);
$linea->conectar_db($conexion);
$datos_proveedor = $proveedor->listaprov();
if ($datos_proveedor){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <h4>Listado de Proveedores...</h4>
        <a href="proveedor_agregaForm.php" class="btn btn-info add-new">Nuevo</a>
        </div>  
        <div class="card card-body">
        
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Línea</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos_proveedor)){
        $id = $row['id'];
        $nombre = $row['nombre'];
        $id_linea = $row['id_linea'];
        
        $nombre_linea = $linea->obtenerNombreLinea($id_linea);
    ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $nombre_linea; ?></td>
                <td>
                    <a href="proveedor_modificaForm.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>   
                    <a href="proveedor_elimina.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>    
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
    
<?php
}
include('footer.php'); 
?>

