<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $nombre = strtoupper($_POST['nombre']);
    $direccion = strtoupper($_POST['direccion']);
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    
    include_once('includes/acceso.php');
    include_once('clases/cliente.php');
    $conexion = connect_db();
    $cliente = new Cliente();
    $cliente->conectar_db($conexion);
    
    $response = $cliente->agrega_cliente($nombre, $direccion, $telefono, $email);

    if ($response) {
        header("location: cliente_lista.php");
    } else {
        echo "No se pudo agregar el cliente";
    }
}
?>
