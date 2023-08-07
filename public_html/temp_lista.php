<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] = 1){
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/temp.php');
$conexion = connect_db();
$temp = new Temp();
$temp->conectar_db($conexion);
$datos_temp = $temp->listatemp();
if ($datos_temp){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <h4>Listado de Registros Temporales...</h4>
        <a href="temp_agregaForm.php" class="btn btn-info add-new">Nuevo</a>
        </div>  
        <div class="card card-body">
        
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos_temp)){
        $id = $row['numero'];
        $cantidad = $row['cantidad'];
        $id_producto = $row['id_producto'];
        // Aquí debes obtener el nombre del producto correspondiente al id_producto desde la tabla producto
        $nombre_producto = "Nombre del producto"; // Reemplaza esto con el valor correcto de la tabla producto
    ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $cantidad; ?></td>
                <td><?php echo $nombre_producto; ?></td>
                <td>
                    <a href="temp_modificaForm.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>   
                    <a href="temp_elimina.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>    
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
