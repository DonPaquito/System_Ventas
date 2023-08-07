<?php
session_start();
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['login_estado']) || $_SESSION['login_estado'] != 1) {
    header("location: login.php");
    exit;
}

include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/producto.php');
$conexion = connect_db();
$oproducto = new Producto();
$oproducto->conectar_db($conexion);
$datos_produ = $oproducto->listaprodu();
if ($datos_produ) {
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <h4>Listado de Productos...</h4>
        <a href="producto_agregaForm.php" class="btn btn-info add-new">Nuevo</a>
        </div>  
        <div class="card card-body">
        
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Unidad</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Costo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row = mysqli_fetch_array($datos_produ)) {
        $id = $row['id'];
        $nombre = $row['nombre_producto'];
        $unidad = $row['unidad_medida'];
        $cantidad = $row['stock'];
        $precio = $row['precio_unidad'];
        $costo = $row['costo_unidad'];
        ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $unidad; ?></td>
                <td><?php echo $cantidad; ?></td>
                <td><?php echo $precio; ?></td>
                <td><?php echo $costo; ?></td>
                <td>
                <a href="producto_modifica.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>   
                <a href="producto_elimina.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>    
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

include_once('footer.php');
?>
