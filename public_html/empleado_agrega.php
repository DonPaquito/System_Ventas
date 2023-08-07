<?php
include('header.php'); 
if (isset($_POST['envia_datos'])){
    $nombre = strtoupper($_POST['nombre']);
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    
    include_once('includes/acceso.php');
    include_once('clases/empleado.php');
    $conexion = connect_db();
    $empleado = new Empleado();
    $empleado->conectar_db($conexion);
    
    $response = $empleado->agrega_empleado($nombre, $telefono, $direccion, $usuario, $contrasena);

    if ($response) {
        header("location: empleado_lista.php");
    } else {
        echo "No se pudo agregar el empleado";
    }
}
?>
