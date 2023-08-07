<?php
/*session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] = 1){
    header("location: login.php");
    exit;
}*/
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/empleado.php');
$conexion = connect_db();
$empleado = new Empleado();
$empleado->conectar_db($conexion);
$datos_emple = $empleado->listaemple();
if ($datos_emple){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <h4>Listado de Empleados...</h4>
        <a href="empleado_agregaForm.php" class="btn btn-info add-new">Nuevo</a>
        </div>  
        <div class="card card-body">
        
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos_emple)){
        $id = $row['id'];
        $nombre = $row['nombre'];
        $telefono = $row['telefono'];
        $direccion = $row['direccion'];
        $usuario = $row['usuario'];
    ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $telefono; ?></td>
                <td><?php echo $direccion; ?></td>
                <td><?php echo $usuario; ?></td>
                <td>
                    <a href="empleado_modificaForm.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>   
                    <a href="empleado_elimina.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>    
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
